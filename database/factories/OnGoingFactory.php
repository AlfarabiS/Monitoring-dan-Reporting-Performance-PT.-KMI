<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OnGoing>
 */
class OnGoingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
            return [
                'NIK' => fake()->randomNumber(),
                'process_id' => fake()->name(),
                'total_time' => fake()->time()
            ];
    }
}
