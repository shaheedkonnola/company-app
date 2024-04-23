<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => fake()->realText(200) ,
            'logo_path' => '/img/logo.png',
            'phone' => $this->faker->numerify('##########'),
            'annual_turn_over' =>  $this->faker->randomFloat(2),
            'created_by' => User::factory(),
            'updaated_by' => User::factory(),
        ];
    }
}
