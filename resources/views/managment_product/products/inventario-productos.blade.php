<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formato de inventario</title>
    <style>
        body { font-family: Arial, sans-serif; color: #222; }
        .header { border-bottom: 2px solid #1f4e79; padding-bottom: 10px; margin-bottom: 15px; }
        .header h1 { margin: 0; font-size: 20px; color: #1f4e79; }
        .header p { margin: 4px 0 0; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; font-size: 10px; margin-top: 10px; }
        th, td { border: 1px solid #666; padding: 6px; vertical-align: top; }
        th { background: #d9eaf7; text-align: left; }
        .blank { height: 24px; }
        .note { margin-top: 12px; font-size: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>FORMATO DE INVENTARIO DE MATERIALES</h1>
        <p>Fecha: {{ date('d/m/Y') }}</p>
        <p>Responsable: __________________________</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Material</th>
                <th>Categoría</th>
                <th>Stock actual</th>
                <th>Cantidad física</th>
                <th>Diferencia</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products ?? [] as $product)
                <tr>
                    <td>{{ $product->name_product ?? 'Sin nombre' }}</td>
                    <td>{{ $product->categories->name_categories ?? 'Sin categoría' }}</td>
                    <td>{{ $product->stock ?? 0 }}</td>
                    <td class="blank"></td>
                    <td class="blank"></td>
                    <td class="blank"></td>
                </tr>
            @endforeach

            @if (empty($products))
                <tr>
                    <td colspan="6">No hay productos registrados.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <p class="note">Instrucciones: anotar la cantidad física encontrada, calcular la diferencia y escribir observaciones si aplica.</p>
</body>
</html>
