<?php

namespace Database\Factories;

use App\Models\course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = ['Pilates Matwork', 'Pilates Reformer', 'Cardio Kickboxing', 'HIIT',
                 'Powerlifting Workshop', 'Functional Strength Training',
                 'Vinyasa Flow Yoga', 'Hatha Yoga', 'Muscle Building Workshops', 'Hypertrophy Training'];

        return [
            'name'=> fake()->randomElement($name),
            'description' => fake()->text(200),
            'start_time' => fake()->dateTimeBetween('16:00', '19:00')->format('H:i'),
            'end_time' => function (array $attributes) {
                $startTime = \DateTime::createFromFormat('H:i', $attributes['start_time']);
                return fake()->dateTimeBetween($startTime->modify('+1 hour'), '20:00')->format('H:i');
            },
            'course_id' => course::get()->random()->id,
        ];
    }
}
