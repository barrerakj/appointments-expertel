<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meeting>
 */
class MeetingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'meeting_name'  => fake()->company(),
            'start_time'    => fake()->dateTimeThisMonth(),
            'end_time'      => fake()->dateTimeThisMonth(),
            'user_id'       => rand(1,10),
        ];
    }
}
