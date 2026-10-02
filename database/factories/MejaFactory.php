<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MejaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nomor_meja' => 'M-' . fake()->unique()->numberBetween(1, 20),
            'qr_code'    => null,
            'kapasitas'  => fake()->randomElement([2, 4, 6]),
            'status'     => 'available',
        ];
    }
}
