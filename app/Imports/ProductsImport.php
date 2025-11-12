<?php

namespace App\Imports;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    private $images = [];
    private $categories;

    public function __construct()
    {
        // Pluck con key = nombre de categoría, value = id
        $this->categories = Categories::pluck('id', 'name_categories')->mapWithKeys(function ($id, $name) {
            return [strtolower(trim($name)) => $id];
        });
    }

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Número de fila que Laravel Excel agrega automáticamente
        $rowNumber = $row['__rowNum__'] ?? null;
        $imageName = $this->images[$rowNumber] ?? null;

        return new Product([
            'id_categories'    => $this->categories[strtolower(trim($row['categoria']))] ?? null,
            'name_product'     => $row['articulo'],
            'codeExt_product'  => $row['codigo'],
            'diameterMM_product' => $row['diametro'],
            //'manufact_product'   => $row['proveedor'],
            //'valueArt_product'   => $row['valor_por_articulo'],
            'stock'              => $row['stock'],
            'image_product'      => $row['imagen'],
        ]);
    }

    
}
