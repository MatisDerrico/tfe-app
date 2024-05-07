<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'user_id' => User::all()->random()->id,
            'date' => Carbon::now(), // Méthode qui renvoit la date du jour
            'name' => fake()->name,
            'email' => fake()->email
        ];
    }
}
