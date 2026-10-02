<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Varian extends Model
{
    protected $table = 'varian';
    protected $primaryKey = 'id_varian';
    protected $fillable = ['id_produk', 'nama_varian', 'tambah_harga', 'status'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
