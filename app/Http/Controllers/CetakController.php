<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use App\Models\Penjualan;
use App\Models\Pembelian;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportPembelian;
use App\Exports\ExportPenjualan;

class CetakController extends Controller
{
    public function cetak($jenis)
    {
        $barangmasuk = Barangmasuk::all();
        $barangkeluar = Barangkeluar::all();
        $penjualan = Penjualan::all();
        $pembelian = Pembelian::all();

        if ($jenis == 'barangmasuk') {
            $pdf = PDF::loadView('cetak', [
                'jenisLaporan' => $jenis,
                'barangmasuk' => $barangmasuk
            ]);
            return $pdf->stream('laporan-barang-masuk.pdf');
        } elseif ($jenis == 'barangkeluar') {
            $pdf = PDF::loadView('cetak', [
                'jenisLaporan' => $jenis,
                'barangkeluar' => $barangkeluar
            ]);
            return $pdf->stream('laporan-barang-keluar.pdf');
        } elseif ($jenis == 'penjualan') {
            $pdf = PDF::loadView('cetak', [
                'jenisLaporan' => $jenis,
                'penjualan' => $penjualan
            ]);
            return $pdf->stream('laporan-penjualan.pdf');
        } elseif ($jenis == 'pembelian') {
            $pdf = PDF::loadView('cetak', [
                'jenisLaporan' => $jenis,
                'pembelian' => $pembelian
            ]);
            return $pdf->stream('laporan-pembelian.pdf');
        };
    }
    public function excel($jenis)
    {
        if ($jenis == 'penjualan') {
            return Excel::download(new ExportPenjualan, 'laporan-penjualan.xlsx');
        } elseif ($jenis == 'pembelian') {
            return Excel::download(new ExportPembelian, 'laporan-pembelian.xlsx');
        };
    }
}
