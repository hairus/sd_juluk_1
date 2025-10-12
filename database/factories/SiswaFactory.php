<?php

namespace Database\Factories;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'nis' => $this->faker->unique()->numerify('2025###'),
            'kelas_id' => Kelas::inRandomOrder()->first()->id ?? Kelas::factory(),
        ];
    }
}

