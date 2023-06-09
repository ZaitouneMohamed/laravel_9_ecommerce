<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->city(),
            "attitude" =>fake()->latitude(),
            "longtitude" => fake()->longitude() ,
            "distance"=>fake()->randomDigit(),
            "charge_delivery"=>fake()->numberBetween($min = 10, $max = 100)
        ];
    }
}
