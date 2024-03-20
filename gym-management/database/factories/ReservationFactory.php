<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = ['Pending', 'Rejected', 'Cancelled'];

        return [
            'status' => fake()->randomElement($status),
            'course_id' => Course::get()->random()->id,
            'user_id' => User::get()->random()->id,
        ];
    }
}
