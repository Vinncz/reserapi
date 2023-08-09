<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
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
            "subject" => fake()->word(),
            "remark" => fake()->sentence(),
            "start" => fake()->dateTime()->format("Y-m-d H:i:s"),
            "end" => fake()->dateTime()->format("Y-m-d H:i:s"),
            "pin" => strval(fake()->randomNumber(6))
        ];
    }
}
