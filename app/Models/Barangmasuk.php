<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
