<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_kategori' => Kategori::factory(),
            'nama_produk' => fake()->words(2, true),
            'harga'       => fake()->numberBetween(10000, 50000),
            'stok'        => fake()->numberBetween(10, 100),
            'deskripsi'   => fake()->sentence(),
            'foto'        => null,
            'status'      => 'available',
        ];
    }
}
