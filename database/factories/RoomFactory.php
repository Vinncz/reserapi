<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'location' => [
                'floor' => fake()->numberBetween(1, 19),
                'landmark' => fake()->sentences()
            ],
            'capacity' => fake()->numberBetween(6, 32),
            'facilities' => [
                'facilities' => [
                    "whiteboard",
                    "sound system",
                    "projector"
                ]
            ]
        ];
    }
}
