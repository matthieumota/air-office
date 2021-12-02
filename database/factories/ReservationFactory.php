<?php

namespace Database\Factories;

use App\Models\Office;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->numberBetween(1, 100),
            'user_id' => User::factory(),
            'office_id' => Office::factory(),
            'start_at' => now(),
            'end_at' => now()->addDays(3),
        ];
    }
}
