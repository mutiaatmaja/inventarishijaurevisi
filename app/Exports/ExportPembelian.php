<?php

namespace App\Exports;

use App\Models\Pembelian;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportPembelian implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('excel.pembelian')->with('pembelian', Pembelian::all());
    }
}
