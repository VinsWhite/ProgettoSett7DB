<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = ['Pilates', 'Cardio', 'Power hour', 'Yoga', 'Bodybuilding'];
        
        return [
            'name'=> fake()->randomElement($name),
            'description' => fake() -> text(200),
            'capacity' => fake() -> numberBetween(20, 40),
        ];
    }
}
