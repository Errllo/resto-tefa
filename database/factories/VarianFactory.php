<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class VarianFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_produk'    => Produk::factory(),
            'nama_varian'  => fake()->randomElement(['Pedas Level 1', 'Pedas Level 2', 'Extra Cheese', 'Normal']),
            'tambah_harga' => fake()->randomElement([0, 2000, 5000]),
            'status'       => 'active',
        ];
    }
}
