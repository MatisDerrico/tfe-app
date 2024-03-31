<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Connection>
 */
class ConnectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $adresseIp = ["172.16.0.1", "10.0.0.1", "192.168.0.1"];

        return [
            'user_id' => User::all()->random()->id,
            'ip' => Arr::random($adresseIp),
        ];
    }
}
