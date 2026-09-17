<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Collection;

class ProductsExport implements FromView
{
    public function __construct(private Collection $products)
    {
    }

    public function view(): View
    {
        return view('exports.excel-products', [
            'products' => $this->products,
        ]);
    }
}
