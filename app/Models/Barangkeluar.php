<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
