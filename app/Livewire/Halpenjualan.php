<?php

namespace App\Livewire;

use App\Models\Penjualan as ModelData;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Barang;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Halpenjualan extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $nama_barang, $jumlah_barang, $ukuran, $foto, $tanggal_penjualan, $mode, $data_edit, $cari, $barangterpilih, $harga;
    public function ubahMode($mode)
    {
        $this->mode = $mode;
    }

    public function updatedNamaBarang()
    {
        $this->reset('ukuran');
    }
    public function updatedUkuran()
    {
        $this->barangterpilih = Barang::where('nama', $this->nama_barang)->where('ukuran', $this->ukuran)->first();
    }

    public function simpan()
    {
        $this->validate([
            'nama_barang' => 'required',
            'jumlah_barang' => 'required|integer|min:1',
            'ukuran' => 'required',
            'tanggal_penjualan' => 'required|date',
            'harga' => 'required'
        ]);

        if ($this->data_edit) {
            $simpan = $this->data_edit;

            // Kembalikan stok ke kondisi sebelum barang keluar
            $this->barangterpilih->stok += $simpan->jumlah_barang;
        } else {
            $simpan = new ModelData();
        }

        // Validasi jumlah barang keluar tidak melebihi stok tersedia
        if ($this->barangterpilih->stok < $this->jumlah_barang) {
            $this->alert('error', 'Jumlah barang keluar melebihi stok tersedia');
            return;
        }

        // Perbarui data
        $simpan->id_barang = $this->barangterpilih->id;
        $simpan->jumlah_barang = $this->jumlah_barang;
        $simpan->tanggal = $this->tanggal_penjualan;
        $simpan->harga = $this->harga;
        $simpan->save();

        // Kurangi stok dengan jumlah barang keluar
        $this->barangterpilih->stok -= $this->jumlah_barang;

        // Simpan perubahan stok pada barang
        $this->barangterpilih->save();

        $this->alert('success', 'Berhasil Menyimpan Data');
        $this->reset([
            'nama_barang',
            'jumlah_barang',
            'ukuran',
            'foto',
            'tanggal_penjualan',
            'data_edit',
            'mode',
            'harga'
        ]);
    }

    public function hapus($id)
    {
        // Ambil data transaksi barang keluar berdasarkan ID
        $data = ModelData::find($id);

        if (!$data) {
            $this->alert('error', 'Data tidak ditemukan');
            return;
        }

        // Ambil data barang terkait
        $barang = $data->barang; // Pastikan ada relasi ke model Barang
        if (!$barang) {
            $this->alert('success', 'Barang terkait tidak ditemukan.');
            return;
        }

        // Tambahkan stok barang dengan jumlah barang keluar
        $barang->stok += $data->jumlah_barang;

        // Simpan perubahan stok
        $barang->save();

        // Hapus data transaksi barang keluar
        $data->delete();
        $this->alert('success', 'Berhasil Menghapus Data');
    }
    public function edit($id)
    {
        $data = ModelData::find($id);
        $this->data_edit = $data;
        $this->barangterpilih = $data->barang;
        $this->nama_barang = $data->barang->nama;
        $this->jumlah_barang = $data->jumlah_barang;
        $this->ukuran = $data->barang->ukuran;
        $this->tanggal_penjualan = $data->tanggal;
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
        if ($this->nama_barang) {
            $ukuran = Barang::where('nama', $this->nama_barang)->get();
        } else {
            $ukuran = [];
        }

        return view('livewire.halpenjualan')->with([
            'semuadata' => $data,
            'namabarang' => Barang::select('nama')->distinct()->get(),
            'ukuranbarang' => $ukuran
        ]);
    }
}
