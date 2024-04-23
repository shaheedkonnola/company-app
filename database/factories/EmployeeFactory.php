<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
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
            'email' => $this->faker->safeEmail(),
            'company_id' => Company::factory(),
            'phone' => $this->faker->numerify('##########'),
            'image_path' =>  '/image/dummy-profile-pic.jpg',
            'join_date' =>  $this->faker->dateTime(),
            'created_by' => User::factory(),
            'updaated_by' => User::factory(),
        ];
    }
}
