<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = ['id_kategori', 'nama_produk', 'harga', 'stok', 'deskripsi', 'foto', 'status'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function varians()
    {
        return $this->hasMany(Varian::class, 'id_produk', 'id_produk');
    }
}
