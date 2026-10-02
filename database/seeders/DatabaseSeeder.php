<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Varian;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Kategori Awal
        $makanan = Kategori::create([
            'nama_kategori' => 'Makanan',
            'status'        => 'active',
        ]);

        $minuman = Kategori::create([
            'nama_kategori' => 'Minuman',
            'status'        => 'active',
        ]);

        // 2. Buat Produk Contoh
        $produk1 = Produk::create([
            'id_kategori' => $makanan->id_kategori,
            'nama_produk' => 'Pepperoni Juara',
            'harga'       => 25000,
            'stok'        => 50,
            'deskripsi'   => 'Pepperoni dengan saus tomat dan keju',
            'status'      => 'available',
        ]);

        // 3. Buat Varian Produk Contoh
        Varian::create([
            'id_produk'    => $produk1->id_produk,
            'nama_varian'  => 'Reguler',
            'tambah_harga' => 0,
        ]);

        Varian::create([
            'id_produk'    => $produk1->id_produk,
            'nama_varian'  => 'Extra pepperoni',
            'tambah_harga' => 2000,
        ]);
    }
}
