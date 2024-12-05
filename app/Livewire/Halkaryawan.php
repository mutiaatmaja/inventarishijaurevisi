<?php

namespace App\Livewire;

use App\Models\User as ModelData;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Role;

class Halkaryawan extends Component
{
    use WithFileUploads;
    public $name, $email, $password, $mode, $data_edit, $cari, $peran;
    public function ubahMode($mode)
    {
        $this->mode = $mode;
    }

    public function simpan()
    {
        if ($this->data_edit) {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $this->data_edit->id,
                'peran' => 'required'
            ]);
            $simpan = $this->data_edit;
        } else {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'peran' => 'required'

            ]);
            $simpan = new ModelData();
        }
        $simpan->name = $this->name;
        $simpan->email = $this->email;

        if ($this->password) {

            $simpan->password = $this->password;
        }
        $simpan->save();
        $simpan->syncRoles([$this->peran]);
        $this->reset([
            'name',
            'email',
            'password',
            'mode',
            'peran',
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
        $this->name = $data->name;
        $this->email = $data->email;
        $this->peran = $data->peran;
        $this->mode = 'edit';
    }
    public function render()
    {
        if ($this->cari) {
            $data = ModelData::where('name', 'like', '%' . $this->cari . '%')->get();
        } else {
            $data = ModelData::all();
        }
        return view('livewire.halkaryawan')->with([
            'semuadata' => $data,
            'semuaPeran' => Role::all()
        ]);
    }
}
