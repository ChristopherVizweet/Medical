<?php

namespace App\Imports;
use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel, WithHeadingRow
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'name_Client' => $row['nombre'],
            'address_Client' => $row['direccion'],
            'email_Client' => $row['email'],
            'phoneNumber_Client' => $row['telefono'],
            'RFC' => $row['rfc']

        ]);
    }
}
