<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seat>
 */
class SeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
           'room_id'=> Room::factory(),
           'row'=> function (array $attributes) {
            return Room::find($attributes['room_id'])->row;},
           'price'=>fake()->numberBetween(50, 500),
           'is_vip'=>fake()->boolean(),
           'is_blocked'=>fake()->boolean(),
        ];
    }
}
