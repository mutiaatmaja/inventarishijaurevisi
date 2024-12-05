<?php

namespace App\Livewire;

use App\Models\Barangmasuk as ModelData;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Barang;

class Halbarangmasuk extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $nama_barang, $jumlah_barang, $ukuran, $foto, $tanggal_masuk, $mode, $data_edit, $cari, $barangterpilih;
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
            'tanggal_masuk' => 'required|date',
        ]);

        if ($this->data_edit) {
            $simpan = $this->data_edit;
            // Kurangi stok dengan jumlah barang lama
            $this->barangterpilih->stok -= $simpan->jumlah_barang;
        } else {
            $simpan = new ModelData();
        }

        // Perbarui data
        $simpan->id_barang = $this->barangterpilih->id;
        $simpan->jumlah_barang = $this->jumlah_barang;
        $simpan->tanggal_masuk = $this->tanggal_masuk;
        $simpan->save();

        // Tambahkan stok dengan jumlah barang baru
        $this->barangterpilih->stok += $this->jumlah_barang;

        // Jika ada foto, simpan dan update nama file
        if ($this->foto) {
            $this->foto->store('fotobarang', 'public');
            $this->barangterpilih->foto = $this->foto->hashName();
        }

        // Simpan perubahan stok pada barang
        $this->barangterpilih->save();

        $this->alert('success', 'Berhasil Menyimpan Data');
        $this->reset([
            'nama_barang',
            'jumlah_barang',
            'ukuran',
            'foto',
            'tanggal_masuk',
            'data_edit',
            'mode',
        ]);
    }

    public function hapus($id)
    {
        // Ambil data transaksi barang masuk berdasarkan ID
        $data = ModelData::find($id);

        if (!$data) {
            $this->alert('error', 'Data tidak ditemukan.');
            return;
        }

        // Ambil data barang terkait
        $barang = $data->barang; // Pastikan ada relasi ke model Barang
        if (!$barang) {
            $this->alert('error', 'Barang terkait tidak ditemukan.');
            return;
        }

        // Kurangi stok barang dengan jumlah barang masuk
        $barang->stok -= $data->jumlah_barang;

        // Validasi stok negatif
        if ($barang->stok < 0) {
            $this->alert('error', 'Stok barang menjadi negatif. Periksa data.');
            return;
        }

        // Simpan perubahan stok
        $barang->save();

        // Hapus data transaksi barang masuk
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
        $this->tanggal_masuk = $data->tanggal_masuk;
        $this->mode = 'edit';
    }


    public function render()
    {
        if ($this->cari) {
            $data = ModelData::whereHas('barang', function ($query) {
                $query->where('nama', 'like', '%' . $this->cari . '%');
            })->get();
        } else {
            $data = ModelData::all();
        }
        if ($this->nama_barang) {
            $ukuran = Barang::where('nama', $this->nama_barang)->get();
        } else {
            $ukuran = [];
        }

        return view('livewire.halbarangmasuk')->with([
            'semuadata' => $data,
            'namabarang' => Barang::select('nama')->distinct()->get(),
            'ukuranbarang' => $ukuran
        ]);
    }
}
