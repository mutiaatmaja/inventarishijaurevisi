<?php

namespace App\Livewire;

use App\Models\Barang as ModelData;
use Livewire\Component;

class Stok extends Component
{
    public $mode, $cari;
    public function render()
    {
        if ($this->cari) {
            $data = ModelData::where('nama', 'like', '%' . $this->cari . '%')->get();
        } else {
            $data = ModelData::all();
        }
        return view('livewire.stok')->with([
            'semuadata' => $data
        ]);
    }
}
