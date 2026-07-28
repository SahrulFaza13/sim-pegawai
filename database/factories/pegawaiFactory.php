<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pegawai>
 */
class pegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pegawai' => fake('id_ID')->name(),
            'jenis_kelamin'=> fake()->randomElement(
                config('pegawai.jenis_kelamin')
            ),
            'pendidikan_terakhir' => fake()->randomElement(
                config('pegawai.pendidikan_terakhir')
            ),
            'tanggal_lahir' => fake()->dateTimeBetween('-60 years', '-18 years')
                ->format('d-m-Y'),
        ];
    }
}
