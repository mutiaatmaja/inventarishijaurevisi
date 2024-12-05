<?php

namespace App\Livewire;

use App\Models\Penjualan as ModelData;
use Livewire\Component;
use Livewire\WithFileUploads;

class Halpenjualan extends Component
{
    use WithFileUploads;
    public $nama_barang, $jumlah_barang, $ukuran, $foto, $tanggal, $harga, $mode, $data_edit, $cari;
    public function ubahMode($mode)
    {
        $this->mode = $mode;
    }

    public function simpan()
    {
        if ($this->data_edit) {
            $this->validate([
                'nama_barang' => 'required',
                'jumlah_barang' => 'required',
                'ukuran' => 'required',
                'tanggal' => 'required',
                'harga' => 'required'
            ]);
            $simpan = $this->data_edit;
        } else {
            $this->validate([
                'nama_barang' => 'required',
                'jumlah_barang' => 'required',
                'ukuran' => 'required',
                'foto' => 'required',
                'tanggal' => 'required',
                'harga' => 'required'
            ]);
            $simpan = new ModelData();
        }
        $simpan->nama_barang = $this->nama_barang;
        $simpan->jumlah_barang = $this->jumlah_barang;
        $simpan->ukuran = $this->ukuran;
        if ($this->foto) {
            $this->foto->store('fotobarang', 'public');
            $simpan->foto = $this->foto->hashName();
        }

        $simpan->tanggal = $this->tanggal;
        $simpan->harga = $this->harga;
        $simpan->save();
        $this->reset([
            'nama_barang',
            'jumlah_barang',
            'ukuran',
            'foto',
            'tanggal',
            'mode',
            'harga',
            'data_edit'
        ]);
    }

    public function hapus($id)
    {
        $hapus = ModelData::find($id);
        $hapus->delete();
    }
    public function edit($id)
    {
        $data = ModelData::find($id);
        $this->data_edit = $data;
        $this->nama_barang = $data->nama_barang;
        $this->jumlah_barang = $data->jumlah_barang;
        $this->ukuran = $data->ukuran;
        $this->tanggal = $data->tanggal;
        $this->harga = $data->harga;
        $this->mode = 'edit';
    }
    public function render()
    {
        if ($this->cari) {
            $data = ModelData::where('nama_barang', 'like', '%' . $this->cari . '%')->get();
        } else {
            $data = ModelData::all();
        }
        return view('livewire.halpenjualan')->with([
            'semuadata' => $data
        ]);
    }
}
