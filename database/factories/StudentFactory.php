<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name' => $user->name,          // Use the same name as the user
        'email' => $user->email,
        'date_of_birth' => $this->faker->date('Y-m-d'),
        'gender' => $this->faker->randomElement(['m', 'f']),
        'user_id' => User::factory(),
        ];
    }
}
