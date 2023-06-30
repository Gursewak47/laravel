<?php

namespace Database\Factories\Employee;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee\Employee>
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
                'first_name' => fake()->name(),
                'last_name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'salary' => fake()->randomFloat(),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
        ];
    }
}
