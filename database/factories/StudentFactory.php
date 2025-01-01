<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SchoolClass;
use App\Models\User;
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
        $class = SchoolClass::pluck('id');
        $user = User::where('role', 'student')->pluck('id');
        return [
            'class_id' => fake()->randomElement($class),
            'user_id' => fake()->unique()->randomElement($user),
            'id_number' => fake()->numberBetween(100, 400),
            'date_of_birth' => fake()->date('Y-m-d'),
            'gender' => fake()->randomElement(['male', 'female'])
        ];
    }
}
