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

class ProductsImport implements ToModel, WithHeadingRow, WithDrawings
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
            'name_product'     => $row['tipo'],
            'codeExt_product'  => $row['codigo_ext'],
            'codeInt_product'  => $row['codigo_int'],
            'diameterMM_product' => $row['diametro_mm'],
            //'diameterIN_product' => $row['diametro_in'],
            'diameter_nominal'   => $row['diametro_nominal'],
            'diameter_exterior'  => $row['diametro_ext'],
            'manufact_product'   => $row['fabricante'],
            'valueArt_product'   => $row['valor_por_articulo'],
            'stock'              => $row['cantidad'],
            'image_product'      => $imageName,
        ]);
    }

    public function drawings()
    {
        return function(Drawing $drawing) {
            $imageName = uniqid() . '.' . pathinfo($drawing->getPath(), PATHINFO_EXTENSION);

            // Guardar la imagen en storage/app/public/images
            $imageContents = file_get_contents($drawing->getPath());
            Storage::disk('public')->put("images/{$imageName}", $imageContents);

            $cell = $drawing->getCoordinates(); // Ejemplo: "D5"
            $rowNumber = filter_var($cell, FILTER_SANITIZE_NUMBER_INT);

            // Relacionar la fila con la imagen
            $this->images[$rowNumber] = $imageName;

            return $drawing;
        };
    }
}
