<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori', 'deskripsi', 'status'];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_kategori', 'id_kategori');
    }
}
