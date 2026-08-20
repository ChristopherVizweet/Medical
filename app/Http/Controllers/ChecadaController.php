<?php

namespace App\Http\Controllers;

use App\Models\Checada;
use App\Models\Empleados;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ChecadaController extends Controller
{
    private const JORNADA_ORDINARIA_MINUTOS = 600;

    public function index(Request $request): View
    {
        $filtros = $request->validate([
            'empleado' => ['nullable', 'string', 'max:255'],
            'desde' => ['nullable', 'date'],
            'hasta' => ['nullable', 'date', 'after_or_equal:desde'],
        ]);

        $empleados = Checada::query()
            ->select('identificador_verificador', 'nombre_verificador')
            ->whereNotNull('identificador_verificador')
            ->orderBy('nombre_verificador')
            ->distinct()
            ->get();

        $consulta = Checada::query()
            ->when($filtros['empleado'] ?? null, fn ($query, $empleado) =>
                $query->where('identificador_verificador', $empleado)
            )
            ->when($filtros['desde'] ?? null, fn ($query, $desde) =>
                $query->whereDate('fecha_verificador', '>=', $desde)
            )
            ->when($filtros['hasta'] ?? null, fn ($query, $hasta) =>
                $query->whereDate('fecha_verificador', '<=', $hasta)
            );

        $calculosDiarios = collect();
        $calculosSemanales = collect();

        if ($request->filled('empleado')) {
            $calculosDiarios = (clone $consulta)
                ->orderBy('fecha_verificador')
                ->get()
                ->map(function (Checada $check): array {
                    $jornada = $this->calcularJornada($check);

                    return [
                        'fecha' => $check->fecha_verificador,
                        'minutos' => $jornada['minutos'],
                        'horas' => $jornada['horas'],
                        'comida' => $jornada['comida'],
                        'minutos_extra' => $jornada['minutos_extra'],
                        'horas_extra' => $jornada['horas_extra'],
                    ];
                });

            $calculosSemanales = $calculosDiarios
                ->filter(fn (array $dia): bool => $dia['minutos'] !== null)
                ->groupBy(fn (array $dia): string => $dia['fecha']->copy()->startOfWeek()->toDateString())
                ->map(function ($dias, string $inicio): array {
                    $minutos = $dias->sum('minutos');

                    return [
                        'inicio' => Carbon::parse($inicio),
                        'fin' => Carbon::parse($inicio)->endOfWeek(),
                        'minutos' => $minutos,
                        'horas' => $this->formatearMinutos($minutos),
                        'minutos_extra' => $dias->sum('minutos_extra'),
                        'horas_extra' => $this->formatearMinutos($dias->sum('minutos_extra')),
                    ];
                })
                ->values();
        }

        $checks = $consulta
            ->orderByDesc('fecha_verificador')
            ->orderBy('nombre_verificador')
            ->paginate(25)
            ->through(function (Checada $check): Checada {
                $check->jornada = $this->calcularJornada($check);

                return $check;
            })
            ->withQueryString();

        return view('employees.checadas', compact(
            'checks',
            'empleados',
            'calculosDiarios',
            'calculosSemanales'
        ));
    }

    private function calcularJornada(Checada $check): array
    {
        $resultado = [
            'minutos' => null,
            'horas' => 'Incompleto',
            'comida' => 'Sin hora de comida',
            'minutos_comida' => 0,
            'minutos_extra' => 0,
            'horas_extra' => '0 h 00 min',
            'tiene_horas_extra' => false,
        ];

        if (! $check->fecha_verificador || ! $check->hora_entrada_verificador) {
            return $resultado;
        }

        $fecha = $check->fecha_verificador->toDateString();
        $entrada = Carbon::parse($fecha.' '.$check->hora_entrada_verificador);

        /*
         * El importador guarda los marcajes en orden. En jornadas de dos
         * marcajes, el segundo ocupa temporalmente la columna de salida a
         * comida; para el cálculo debe considerarse como la salida del día.
         */
        $salidaRegistrada = $check->hora_salida_verificador;

        if (
            ! $salidaRegistrada
            && $check->hora_salida_comida_verificador
            && ! $check->hora_entrada_comida_verificador
        ) {
            $salidaRegistrada = $check->hora_salida_comida_verificador;
        }

        if (! $salidaRegistrada) {
            return $resultado;
        }

        $salida = Carbon::parse($fecha.' '.$salidaRegistrada);

        if ($salida->lessThanOrEqualTo($entrada)) {
            return $resultado;
        }

        $minutos = $entrada->diffInMinutes($salida);

        if (
            $check->hora_salida_verificador
            && $check->hora_salida_comida_verificador
            && $check->hora_entrada_comida_verificador
        ) {
            $salidaComida = Carbon::parse($fecha.' '.$check->hora_salida_comida_verificador);
            $entradaComida = Carbon::parse($fecha.' '.$check->hora_entrada_comida_verificador);

            if ($entradaComida->greaterThan($salidaComida)) {
                $resultado['minutos_comida'] = $salidaComida->diffInMinutes($entradaComida);
                $resultado['comida'] = $this->formatearMinutos($resultado['minutos_comida']);
                $minutos -= $resultado['minutos_comida'];
            }
        }

        $resultado['minutos'] = max(0, (int) $minutos);
        $resultado['horas'] = $this->formatearMinutos($resultado['minutos']);
        $resultado['minutos_extra'] = max(0, $resultado['minutos'] - self::JORNADA_ORDINARIA_MINUTOS);
        $resultado['horas_extra'] = $this->formatearMinutos($resultado['minutos_extra']);
        $resultado['tiene_horas_extra'] = $resultado['minutos_extra'] > 0;

        return $resultado;
    }

    private function calcularMinutosTrabajados(Checada $check): ?int
    {
        return $this->calcularJornada($check)['minutos'];
    }

    private function formatearMinutos(?int $minutos): string
    {
        if ($minutos === null) {
            return 'Incompleto';
        }

        return sprintf('%d h %02d min', intdiv($minutos, 60), $minutos % 60);
    }

    public function porEmpleado(Request $request, Empleados $empleado): View
    {
        $filtros = $request->validate([
            'desde' => ['nullable', 'date'],
            'hasta' => ['nullable', 'date', 'after_or_equal:desde'],
        ]);

        $consulta = Checada::query()
            ->where('identificador_verificador', $empleado->numero_checador)
            ->when($filtros['desde'] ?? null, fn ($query, $desde) =>
                $query->whereDate('fecha_verificador', '>=', $desde)
            )
            ->when($filtros['hasta'] ?? null, fn ($query, $hasta) =>
                $query->whereDate('fecha_verificador', '<=', $hasta)
            );

        $resumen = (clone $consulta)
            ->selectRaw('COUNT(*) as total')
            ->selectRaw("SUM(CASE WHEN estado_verificador = 'completo' THEN 1 ELSE 0 END) as completos")
            ->selectRaw("SUM(CASE WHEN estado_verificador = 'incompleto' THEN 1 ELSE 0 END) as incompletos")
            ->selectRaw("SUM(CASE WHEN estado_verificador = 'falta' THEN 1 ELSE 0 END) as faltas")
            ->first();

        $checks = $consulta
            ->orderByDesc('fecha_verificador')
            ->paginate(20)
            ->through(function (Checada $check): Checada {
                $check->jornada = $this->calcularJornada($check);

                return $check;
            })
            ->withQueryString();

        return view('employees.checadas-empleado', compact('empleado', 'checks', 'resumen'));
    }

    public function mostrarImportacion(): View
    {
        return view('employees.importar-checadas');
    }

public function encabezadoValido(string $encabezado): bool
    {

      $columnasEsperadas = [
        'No',
        'Mchn',
        'EnNo',
        'Name',
        'Mode',
        'IOMd',
        'DateTime',
    ];

    /*
     * El archivo del reloj utiliza tabulaciones.
     */
    $columnas = preg_split('/\t+/', trim($encabezado));

    if ($columnas === false) {
        return false;
    }

    /*
     * Elimina los espacios adicionales que aparecen
     * antes y después de cada encabezado.
     */
    $columnas = array_map(
        fn (string $columna): string => trim($columna),
        $columnas
    );

    return $columnas === $columnasEsperadas;
    }

    public function separarLinea(string $linea): ?array
    {
        $columnas = preg_split('/\t+/', trim($linea));

    if ($columnas === false) {
        return null;
    }

    $columnas = array_map(
        fn (string $columna): string => trim($columna),
        $columnas
    );

    return count($columnas) === 7
        ? $columnas
        : null;
    }

    public function normalizarFechaHora(string $fechaHora): string
    {
       
    $fechaHora = trim($fechaHora);

    /*
     * Convierte dos o más espacios en uno.
     */
    $fechaHora = preg_replace('/\s+/u', ' ', $fechaHora);

    $formatos = [
        'Y/m/d H:i:s',
        'Y-m-d H:i:s',
        'd/m/Y H:i:s',
        'd-m-Y H:i:s',
    ];

    foreach ($formatos as $formato) {
        try {
            $fecha = Carbon::createFromFormat(
                '!'.$formato,
                $fechaHora
            );

            if (
                $fecha !== false
                && $fecha->format($formato) === $fechaHora
            ) {
                return $fecha->format('Y-m-d H:i:s');
            }
        } catch (\Throwable) {
            // Se intenta con el siguiente formato.
        }
    }

    throw new \InvalidArgumentException(
        "Fecha y hora inválidas: {$fechaHora}"
    );
    }

    public function depurarHoras(array $horas): array
    {
        $horasUnicas = array_unique($horas);

        sort($horasUnicas);

        return $horasUnicas;
    }

    public function asignarHoras(array $horas): array
    {
        $asignadas = [
            'entrada' => null,
            'salida_comida' => null,
            'entrada_comida' => null,
            'salida' => null,
        ];

        $conteo = count($horas);

        if ($conteo >= 1) {
            $asignadas['entrada'] = $horas[0];
        }

        if ($conteo >= 2) {
            $asignadas['salida_comida'] = $horas[1];
        }

        if ($conteo >= 3) {
            $asignadas['entrada_comida'] = $horas[2];
        }

        if ($conteo === 4) {
            $asignadas['salida'] = $horas[3];
        }

        return $asignadas;
    }

    public function mostrarChecadas(): View
    {
        $checadas = Checada::query()
            ->orderByDesc('fecha_verificador')
            ->orderBy('hora_entrada_verificador')
            ->get();

        return view('employees.checadas', compact('checadas'));
    }
   public function importar(Request $request): RedirectResponse
{
    $request->validate([
        'archivo_checadas' => [
            'required',
            'file',
            'max:10240',
            'extensions:txt,csv',
        ],
    ], [
        'archivo_checadas.required' => 'Selecciona un archivo para importar.',
        'archivo_checadas.file' => 'El archivo seleccionado no es válido.',
        'archivo_checadas.max' => 'El archivo no debe superar los 10 MB.',
        'archivo_checadas.extensions' => 'El archivo debe tener extensión TXT o CSV.',
    ]);

    $contenido = file_get_contents(
        $request->file('archivo_checadas')->getRealPath()
    );

    if ($contenido === false || trim($contenido) === '') {
        return back()->withErrors([
            'archivo_checadas' => 'El archivo está vacío o no se pudo leer.',
        ]);
    }

    if (! mb_check_encoding($contenido, 'UTF-8')) {
        $contenido = mb_convert_encoding(
            $contenido,
            'UTF-8',
            'Windows-1252'
        );
    }

    $lineas = preg_split('/\R/u', trim($contenido));

    $encabezado = preg_replace(
        '/^\x{FEFF}/u',
        '',
        trim((string) array_shift($lineas))
    );

    /*comprobacion de encabezado
    dd([
    'encabezado_leido' => $encabezado,

    'separado_por_tabs' => preg_split(
        '/\t+/',
        $encabezado
    ),

    'separado_por_espacios' => preg_split(
        '/\s+/',
        $encabezado
    ),

    'separado_por_comas' => str_getcsv(
        $encabezado,
        ','
    ),

    'caracteres_hexadecimales' => bin2hex($encabezado),

    'encabezado_valido' =>
        $this->encabezadoValido($encabezado),
]);*/


    if (! $this->encabezadoValido($encabezado)) {
        return back()->withErrors([
            'archivo_checadas' =>
                'El encabezado no es válido. Se esperaba: No, Mchn, EnNo, Name, Mode, IOMd y DateTime.',
        ]);
    }

    $errores = [];
    $registros = [];

    foreach ($lineas as $indice => $linea) {
        $numeroLinea = $indice + 2;
        $linea = trim($linea);

        if ($linea === '') {
            continue;
        }

        $datos = $this->separarLinea($linea);

        if ($datos === null) {
            $errores[] =
                "Línea {$numeroLinea}: no contiene las siete columnas esperadas.";

            continue;
        }

        [, , $identificador, $nombre, , , $fechaHora] = $datos;

        $identificador = trim($identificador);
        $nombre = trim($nombre);

        if ($identificador === '') {
            $errores[] =
                "Línea {$numeroLinea}: no contiene identificador EnNo.";

            continue;
        }

        if ($nombre === '') {
            $errores[] =
                "Línea {$numeroLinea}: no contiene el nombre del verificador.";

            continue;
        }

        try {
            $marca = Carbon::createFromFormat(
                '!Y-m-d H:i:s',
                $this->normalizarFechaHora($fechaHora)
            );
        } catch (\Throwable) {
            $errores[] =
                "Línea {$numeroLinea}: DateTime '{$fechaHora}' no es válido.";

            continue;
        }

        /*
         * Cada identificador y fecha forman un resumen diario independiente.
         */
        $clave = $identificador.'|'.$marca->toDateString();

        $registros[$clave] ??= [
            'identificador' => $identificador,
            'nombre' => $nombre,
            'fecha' => $marca->toDateString(),
            'horas' => [],
            'lineas' => [],
        ];

        $registros[$clave]['horas'][] = $marca->format('H:i:s');
        $registros[$clave]['lineas'][] = $numeroLinea;
    }

    $guardados = 0;

    DB::transaction(
        function () use (
            $registros,
            &$errores,
            &$guardados
        ): void {
            foreach ($registros as $registro) {
                $horas = $this->depurarHoras($registro['horas']);

                if (count($horas) > 4) {
                    $lineas = implode(', ', $registro['lineas']);

                    $errores[] =
                        "Líneas {$lineas}: hay más de cuatro marcajes válidos ".
                        "para {$registro['nombre']} el {$registro['fecha']}. ".
                        'El día no fue importado porque requiere revisión.';

                    continue;
                }

                $horasAsignadas = $this->asignarHoras($horas);

                Checada::query()->updateOrCreate(
                    [
                        'identificador_verificador' =>
                            $registro['identificador'],

                        'fecha_verificador' =>
                            $registro['fecha'],
                    ],
                    [
                        'nombre_verificador' =>
                            $registro['nombre'],

                        'hora_entrada_verificador' =>
                            $horasAsignadas['entrada'],

                        'hora_salida_comida_verificador' =>
                            $horasAsignadas['salida_comida'],

                        'hora_entrada_comida_verificador' =>
                            $horasAsignadas['entrada_comida'],

                        'hora_salida_verificador' =>
                            $horasAsignadas['salida'],

                        'estado_verificador' =>
                            count($horas) === 4
                                ? 'completo'
                                : 'incompleto',
                    ]
                );

                $guardados++;
            }
        }
    );

    if ($guardados === 0) {
        return back()->withErrors([
            'archivo_checadas' =>
                'No se encontró ningún registro válido para importar.',

            ...array_slice($errores, 0, 50),
        ]);
    }

    return redirect()
        ->route('checadas.index')
        ->with(
            'success',
            "Se importaron {$guardados} registros diarios correctamente."
        )
        ->with('import_errors', array_slice($errores, 0, 100));
}
 }
