<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de salidas del vehículo</title>
    <style>
        @page { margin: 28px 30px; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 9px; color: #243447; }
        .header { background-color: #173b57; color: #ffffff; padding: 14px 16px; margin-bottom: 14px; }
        .header h1 { margin: 0 0 5px; font-size: 18px; }
        .header p { margin: 0; color: #e3edf5; font-size: 10px; }
        .section-title { margin: 0 0 7px; color: #173b57; font-size: 11px; }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #d5dee7; padding: 6px 5px; text-align: left; }
        th { background-color: #eaf0f5; color: #173b57; font-size: 8px; }
        .vehicle-info { margin-top: 0; margin-bottom: 14px; }
        .vehicle-info td { width: 33.33%; padding: 8px 9px; vertical-align: top; }
        .label { display: block; margin-bottom: 4px; color: #627487; font-size: 7px; font-weight: bold; text-transform: uppercase; }
        .value { color: #243447; font-size: 9px; font-weight: bold; }
        .summary { margin-top: 0; margin-bottom: 14px; }
        .summary th, .summary td { text-align: center; }
        .summary td { color: #173b57; font-size: 9px; font-weight: bold; }
        .details thead { display: table-header-group; }
        .details tr { page-break-inside: avoid; }
        .details tbody tr:nth-child(even) { background-color: #f5f8fa; }
        .details tfoot th { background-color: #dce8f1; }
        .empty { text-align: center; color: #627487; padding: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reporte de salidas del vehículo</h1>
        <p>Periodo del {{ $fechaInicio->format('d/m/Y') }} al {{ $fechaFin->format('d/m/Y') }}</p>
    </div>

    <h2 class="section-title">Información del vehículo</h2>
    <table class="vehicle-info">
        <tbody>
            <tr>
                <td><span class="label">Vehículo</span><span class="value">{{ $vehiculo->nombre_vehiculo ?? 'Sin información' }}</span></td>
                <td><span class="label">Placas</span><span class="value">{{ $vehiculo->placas_vehiculo ?? 'Sin información' }}</span></td>
                <td><span class="label">Marca / Modelo</span><span class="value">{{ $vehiculo->marca_vehiculo ?? 'Sin información' }} / {{ $vehiculo->modeloAño_vehiculo ?? 'Sin información' }}</span></td>
            </tr>
            <tr>
                <td><span class="label">Área de adscripción</span><span class="value">{{ $vehiculo->area_vehiculo ?? 'Sin información' }}</span></td>
                <td><span class="label">Resguardatario</span><span class="value">{{ $vehiculo->encargado->Nombre ?? 'Sin información' }} {{ $vehiculo->encargado->apellidos ?? 'Sin información' }}</span></td>
                <td><span class="label">No. de serie</span><span class="value">{{ $vehiculo->numeroSerie_vehiculo ?? 'Sin información' }}</span></td>
            </tr>
        </tbody>
    </table>

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
                <td>${{ number_format($resumen['gasto_combustible'], 2) }}</td>
                <td>{{ number_format($resumen['litros'], 2) }} L</td>
                <td>{{ $resumen['costo_por_litro'] !== null ? '$' . number_format($resumen['costo_por_litro'], 2) . '/L' : 'N/D' }}</td>
                <td>{{ $resumen['kilometros_por_litro'] !== null ? number_format($resumen['kilometros_por_litro'], 2) . ' km/L' : 'N/D' }}</td>
                <td>{{ $resumen['pendientes'] }}</td>
            </tr>
        </tbody>
    </table>

    <table class="details">
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
                    <td class="empty" colspan="11">No hay salidas registradas en este periodo.</td>
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
