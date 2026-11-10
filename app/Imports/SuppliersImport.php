<?php

namespace App\Imports;

use App\Models\Categories;
use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SuppliersImport implements ToModel, WithHeadingRow
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Supplier([
            'name_supplier' => $row['nombre'],
            'encargado_suppliers' => $row['contacto'],
            'rfc_supplier' => $row['rfc'],
            'phoneNumber_supplier' => $row['numero_telefonico']

        ]);
    }
}
