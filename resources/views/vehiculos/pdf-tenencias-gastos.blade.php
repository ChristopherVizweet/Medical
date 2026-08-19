<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gastos de Tenencias del Vehículo</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #111827; }
        h1, h2 { text-align: center; margin: 0 0 10px; }
        .header { margin-bottom: 20px; }
        .card { border: 1px solid #d1d5db; padding: 12px; margin-bottom: 16px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #d1d5db; padding: 6px; text-align: left; }
        th { background-color: #e5e7eb; }
        .total { font-weight: bold; text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Resumen de gastos de tenencias</h1>
        <h2>{{ $vehiculo->nombre_vehiculo ?? 'Vehículo sin nombre' }}</h2>
    </div>

    <div class="card">
        <p><strong>Vehículo:</strong> {{ $vehiculo->nombre_vehiculo ?? 'Sin información' }}</p>
        <p><strong>Placas:</strong> {{ $vehiculo->placas_vehiculo ?? 'Sin información' }}</p>
        <p><strong>Marca/Modelo:</strong> {{ $vehiculo->marca_vehiculo ?? 'Sin información' }} / {{ $vehiculo->modeloAño_vehiculo ?? 'Sin información' }}</p>
        <p><strong>Área:</strong> {{ $vehiculo->area_vehiculo ?? 'Sin información' }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de pago</th>
                <th>Fecha próxima</th>
                <th>Monto</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tenencias as $tenencia)
                <tr>
                    <td>{{ $tenencia->id }}</td>
                    <td>{{ $tenencia->fecha_pago_tenencias ?? 'Sin información' }}</td>
                    <td>{{ $tenencia->fecha_tenencias_proxima ?? 'Sin información' }}</td>
                    <td>${{ number_format((float) ($tenencia->monto_tenencias ?? 0), 2) }}</td>
                    <td>{{ $tenencia->observaciones_tenencias ?? 'Sin información' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay registros de tenencias para este vehículo.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="card">
        <p class="total">Costo total de gastos: ${{ number_format((float) $totalGeneral, 2) }}</p>
    </div>
</body>
</html>
