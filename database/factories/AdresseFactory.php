<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adresse>
 */
class AdresseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => fake()->word(),
            'name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'postel_code' => fake()->numberBetween($min = 10000, $max = 99999),
            'city' => fake()->city(),
            'adresse' => fake()->address(),
            'user_id' => 2
        ];
    }
}
