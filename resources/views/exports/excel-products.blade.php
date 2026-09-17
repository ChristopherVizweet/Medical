<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Categoría</th>
            <th>Artículo</th>
            <th>Código exterior</th>
            <th>Código interior</th>
            <th>Diámetro (mm)</th>
            <th>Diámetro (inch)</th>
            <th>Stock</th>
            <th>Valor por artículo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->categories->name_categories ?? 'Sin categoría' }}</td>
                <td>{{ $product->name_product ?? 'Sin nombre' }}</td>
                <td>{{ $product->codeExt_product ?? 'Sin código exterior' }}</td>
                <td>{{ $product->codeint_product ?? 'Sin código interior' }}</td>
                <td>{{ $product->diameterMM_product ?? 'Sin diámetro' }}</td>
                <td>{{ $product->diameterinch_product ?? 'Sin diámetro' }}</td>
                <td>{{ $product->stock ?? 0 }}</td>
                <td>{{ $product->valueArt_product ?? 0 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
