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
            'landmark' => fake()->sentences()
        ]);

        $facilities = json_encode([
            'facilities' => [
                "whiteboard",
                "sound system",
                "projector"
            ]
        ]);

        return [
            'name' => fake()->name(),
            'location' => $location,
            'capacity' => fake()->numberBetween(6, 32),
            'facilities' => $facilities
        ];
    }
}
