<?php

namespace Database\Factories;

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
        return [
            "room_id" => fake()->numberBetween(1, 5),
            "reserver_name" => fake()->name(),
            "subject" => fake()->words(),
            "remark" => fake()->sentence(),
            "start" => fake()->now(),
            "end" => fake()->now(),
            "pin" => str(fake()->randomNumber(6))
        ];
    }
}
