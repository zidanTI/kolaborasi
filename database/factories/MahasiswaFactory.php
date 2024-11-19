<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_mhs' => fake()->name(),
            'nim' => fake()->unique()->numerify('23########'),
            'prodi' => fake()->randomElement(['Teknik Informatika','Sistem Informasi']),
            'asal' => fake()->address(),
        ];
    }
}
