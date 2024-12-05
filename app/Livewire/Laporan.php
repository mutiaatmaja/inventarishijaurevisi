<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use App\Models\Penjualan;
use App\Models\Pembelian;

class Laporan extends Component
{
    public $jenisLaporan, $bulan;
    public function lihatLaporan($jenis)
    {
        $this->jenisLaporan = $jenis;
    }

    public function render()
    {
        if ($this->bulan) {
            $bulan = $this->bulan;
            $barangmasuk = Barangmasuk::whereMonth('tanggal_masuk', $bulan)->get();
            $barangkeluar = Barangkeluar::whereMonth('tanggal_keluar', $bulan)->get();
            $penjualan = Penjualan::whereMonth('tanggal', $bulan)->get();
            $pembelian = Pembelian::whereMonth('tanggal', $bulan)->get();
        } else {
            $barangmasuk = Barangmasuk::all();
            $barangkeluar = Barangkeluar::all();
            $penjualan = Penjualan::all();
            $pembelian = Pembelian::all();
        }
        return view('livewire.laporan')->with([
            'barangmasuk' => $barangmasuk,
            'barangkeluar' => $barangkeluar,
            'penjualan' => $penjualan,
            'pembelian' => $pembelian
        ]);
    }
}
