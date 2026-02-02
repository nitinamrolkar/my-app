<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'date_of_birth' => $this->faker->date('Y-m-d'),
        'gender' => $this->faker->randomElement(['m', 'f']),
        'age' => $this->faker->numberBetween(30, 50),
        'user_id' => User::factory(),
        ];
    }
}
