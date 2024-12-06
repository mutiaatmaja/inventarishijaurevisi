<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
