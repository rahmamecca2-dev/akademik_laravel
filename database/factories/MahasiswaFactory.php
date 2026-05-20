<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mahasiswa>
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
            'nim' => fake()->bothify('##########'),
            'nama_lengkap' => fake()->name(),
            'tempat_lahir' => fake()->city(),
            'tgl_lahir' => fake()->date('Y-m-d'),
            'email' => fake()->unique()->safeEmail(),
            'prodi' => fake()->randomElement(['MI', 'TRPL', 'TK', 'Animasi']),
            'alamat' => fake()->address(),
        ];
    }
}
