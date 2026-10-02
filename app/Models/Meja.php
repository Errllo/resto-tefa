<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meja extends Model
{
    use HasFactory;

    protected $table = 'meja';
    protected $primaryKey = 'id_meja';
    protected $fillable = ['nomor_meja', 'qr_code', 'kapasitas', 'status'];
}
