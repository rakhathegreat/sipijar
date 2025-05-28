<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alamat>
 */
class KelurahanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $kelurahans = ['Banjar', 'Balokang', 'Jajawar', 'Neglasari', 'Mekarsari', 'Situbatu', 'Cibeureum'];

public function definition(): array
{
    return [
        'kelurahan' => $this->kelurahans[array_rand($this->kelurahans)],
        'rt' => fake()->numberBetween(1, 10),
        'rw' => fake()->numberBetween(1, 10),
    ];
}

public function withKelurahan(string $name)
{
    return $this->state(fn () => ['kelurahan' => $name]);
}

}