<?php

namespace App\Exports;
use App\inventoriesMovimiento;
use App\Models\InventarioMovimiento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

/**class EntradasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    
   
} */
class EntradasExport implements FromView
{
    public function view(): View
    {
        return view('exports.excel-entradas', [
            'movimientos' => InventarioMovimiento::with(['productos.product','recibe','firma',
       'proveedor','productos','product'])
                    ->where('tipoMovimiento', 'entrada')
                    ->orderBy('fecha_movimiento', 'desc')
                    ->get()
        ]);
    }
}
class InvoicesExport implements WithDrawings
{
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/storage/logo1.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B3');

        return $drawing;
    }
}

