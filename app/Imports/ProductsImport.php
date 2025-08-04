<?php

namespace App\Imports;

use App\Models\Categories;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    private $categories;
    public function __construct()
    {
        $this->categories = Categories::pluck('id', 'name_categories');
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'id_categories' => $this->categories[$row['categoria']],
            'name_product' => $row['tipo'],
            'codeExt_product' => $row['codigo_ext'],
            'codeInt_product' => $row['codigo_int'],
            'diameterMM_product' => $row['diametro_mm'],
            //'diameterIN_product' => $row['diametro_in'],
            'diameter_nominal' => $row['diametro_nominal'],
            'diameter_exterior' => $row['diametro_ext'],
            'manufact_product' => $row['fabricante'],
            'valueArt_product' => $row['valor_por_articulo'],
        ]);
    }
}
