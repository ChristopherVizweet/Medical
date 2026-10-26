<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de salidas del vehículo</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 10px; }
        h1, p { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #777; padding: 5px; text-align: left; }
        th { background: #e5e7eb; }
        .summary td { text-align: center; }
    </style>
</head>
<body>
    <h1>Reporte de salidas del vehículo</h1>
    <p>{{ $vehiculo->nombre_vehiculo }} — {{ $vehiculo->placas_vehiculo }}</p>
    <p>Periodo: {{ $fechaInicio->format('d/m/Y') }} al {{ $fechaFin->format('d/m/Y') }}</p>

    <table class="summary">
        <thead>
            <tr>
                <th>Kilómetros</th>
                <th>Dinero entregado</th>
                <th>Gasto total de combustible</th>
                <th>Litros</th>
                <th>Costo promedio por litro</th>
                <th>Rendimiento promedio (km/L)</th>
                <th>Salidas pendientes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ number_format($resumen['kilometros'], 2) }} km</td>
                <td>${{ number_format($resumen['dinero'], 2) }}</td>
                <td>{{ number_format($resumen['litros'], 2) }} L</td>
                <td>{{ $resumen['costo_por_litro'] !== null ? '$' . number_format($resumen['costo_por_litro'], 2) . '/L' : 'N/D' }}</td>
                <td>{{ $resumen['kilometros_por_litro'] !== null ? number_format($resumen['kilometros_por_litro'], 2) . ' km/L' : 'N/D' }}</td>
                <td>{{ $resumen['pendientes'] }}</td>
                <td>${{ number_format($resumen['gasto_combustible'], 2) }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Conductor</th>
                <th>Obra o destino</th>
                <th>Odómetro inicial</th>
                <th>Odómetro final</th>
                <th>Km recorridos</th>
                <th>Litros</th>
                <th>Costo por litro</th>
                <th>Rendimiento km/L</th>
                <th>Dinero entregado</th>
                <th>Gasto combustible</th>
            </tr>
        </thead>
        <tbody>
            @forelse($salidas as $salida)
                <tr>
                    <td>{{ $salida->fecha->format('d/m/Y') }}</td>
                    <td>{{ $salida->conductor ? $salida->conductor->Nombre . ' ' . $salida->conductor->apellidos : 'No especificado' }}</td>
                    <td>{{ $salida->obra }}</td>
                    <td>{{ number_format($salida->odometro_inicial, 2) }} km</td>
                    <td>{{ $salida->odometro_final !== null ? number_format($salida->odometro_final, 2) . ' km' : 'Pendiente' }}</td>
                    <td>{{ $salida->kilometros_recorridos !== null ? number_format($salida->kilometros_recorridos, 2) . ' km' : 'Pendiente' }}</td>
                    <td>{{ number_format($salida->litros_cargados, 2) }} L</td>
                    <td>{{ $salida->costo_por_litro !== null ? '$' . number_format($salida->costo_por_litro, 2) . '/L' : 'N/D' }}</td>
                    <td>{{ $salida->kilometros_por_litro !== null ? number_format($salida->kilometros_por_litro, 2) . ' km/L' : 'N/D' }}</td>
                    <td>${{ number_format($salida->dinero_entregado, 2) }}</td>
                    <td>${{ number_format(($salida->costo_por_litro ?? 0) * (float) $salida->litros_cargados, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="11">No hay salidas registradas en este periodo.</td>
                </tr>
            @endforelse
        </tbody>
        @if($salidas->isNotEmpty())
            <tfoot>
                <tr>
                    <th colspan="5">Totales del periodo</th>
                    <th>{{ number_format($resumen['kilometros'], 2) }} km</th>
                    <th>{{ number_format($resumen['litros'], 2) }} L</th>
                    <th>{{ $resumen['costo_por_litro'] !== null ? '$' . number_format($resumen['costo_por_litro'], 2) . '/L' : 'N/D' }}</th>
                    <th>{{ $resumen['kilometros_por_litro'] !== null ? number_format($resumen['kilometros_por_litro'], 2) . ' km/L' : 'N/D' }}</th>
                    <th>${{ number_format($resumen['dinero'], 2) }}</th>
                    <th>${{ number_format($resumen['gasto_combustible'], 2) }}</th>
                </tr>
            </tfoot>
        @endif
    </table>
</body>
</html>
