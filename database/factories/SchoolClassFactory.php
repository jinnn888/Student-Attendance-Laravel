<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Teacher;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SchoolClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $teachers = Teacher::pluck('id');
        return [
            'name' => fake()->name,
            'grade_level' => fake()->numberBetween(11, 12),
            'teacher_id' => fake()->unique()->randomElement($teachers)  
        ];
    }
}
