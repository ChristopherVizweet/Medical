<table>
    <tr>
        <th colspan="11">Reporte de salidas del vehículo</th>
    </tr>
    <tr>
        <th colspan="11">{{ $vehiculo->nombre_vehiculo }} — {{ $vehiculo->placas_vehiculo }}</th>
    </tr>
    <tr>
        <th colspan="11">
            Periodo: {{ $fechaInicio->format('d/m/Y') }} al {{ $fechaFin->format('d/m/Y') }}
        </th>
    </tr>
    <tr>
        <th>Kilómetros recorridos</th>
        <th>Dinero entregado</th>
        <th>Litros cargados</th>
        <th>Costo promedio por litro</th>
        <th>Rendimiento promedio (km/L)</th>
        <th>Salidas pendientes</th>
        <th>Gasto total de combustible</th>
    </tr>
    <tr>
        <td>{{ number_format($resumen['kilometros'], 2, '.', '') }}</td>
        <td>{{ number_format($resumen['dinero'], 2, '.', '') }}</td>
        <td>{{ number_format($resumen['litros'], 2, '.', '') }}</td>
        <td>{{ $resumen['costo_por_litro'] !== null ? number_format($resumen['costo_por_litro'], 2, '.', '') : 'N/D' }}</td>
        <td>{{ $resumen['kilometros_por_litro'] !== null ? number_format($resumen['kilometros_por_litro'], 2, '.', '') : 'N/D' }}</td>
        <td>{{ $resumen['pendientes'] }}</td>
        <td>{{ number_format($resumen['gasto_combustible'], 2, '.', '') }}</td>
    </tr>
    <tr>
        <th>Fecha</th>
        <th>Conductor</th>
        <th>Obra o destino</th>
        <th>Odómetro inicial (km)</th>
        <th>Odómetro final (km)</th>
        <th>Kilómetros recorridos</th>
        <th>Litros cargados</th>
        <th>Costo por litro</th>
        <th>Rendimiento (km/L)</th>
        <th>Dinero entregado</th>
        <th>Gasto combustible</th>
    </tr>
    @foreach($salidas as $salida)
        <tr>
            <td>{{ $salida->fecha->format('d/m/Y') }}</td>
            <td>{{ $salida->conductor ? $salida->conductor->Nombre . ' ' . $salida->conductor->apellidos : 'No especificado' }}</td>
            <td>{{ $salida->obra }}</td>
            <td>{{ number_format($salida->odometro_inicial, 2, '.', '') }}</td>
            <td>{{ $salida->odometro_final !== null ? number_format($salida->odometro_final, 2, '.', '') : 'Pendiente' }}</td>
            <td>{{ $salida->kilometros_recorridos !== null ? number_format($salida->kilometros_recorridos, 2, '.', '') : 'Pendiente' }}</td>
            <td>{{ number_format($salida->litros_cargados, 2, '.', '') }}</td>
            <td>{{ $salida->costo_por_litro !== null ? number_format($salida->costo_por_litro, 2, '.', '') : 'N/D' }}</td>
            <td>{{ $salida->kilometros_por_litro !== null ? number_format($salida->kilometros_por_litro, 2, '.', '') : 'N/D' }}</td>
            <td>{{ number_format($salida->dinero_entregado, 2, '.', '') }}</td>
            <td>{{ number_format(($salida->costo_por_litro ?? 0) * (float) $salida->litros_cargados, 2, '.', '') }}</td>
        </tr>
    @endforeach
    <tr>
        <th colspan="5">Totales del periodo</th>
        <th>{{ number_format($resumen['kilometros'], 2, '.', '') }}</th>
        <th>{{ number_format($resumen['litros'], 2, '.', '') }}</th>
        <th>{{ $resumen['costo_por_litro'] !== null ? number_format($resumen['costo_por_litro'], 2, '.', '') : 'N/D' }}</th>
        <th>{{ $resumen['kilometros_por_litro'] !== null ? number_format($resumen['kilometros_por_litro'], 2, '.', '') : 'N/D' }}</th>
        <th>{{ number_format($resumen['dinero'], 2, '.', '') }}</th>
        <th>{{ number_format($resumen['gasto_combustible'], 2, '.', '') }}</th>
    </tr>
</table>
