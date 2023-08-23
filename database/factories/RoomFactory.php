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
        $location = json_encode([
            'floor' => fake()->numberBetween(1, 19),
            'landmark' => fake()->streetName()
        ]);

        return [
            'name' => fake()->colorName(),
            'location' => $location,
            'capacity' => fake()->numberBetween(6, 32),
            'facilities' => json_encode([
                "whiteboard",
                "sound system",
                "projector"
            ])
        ];
    }
}
