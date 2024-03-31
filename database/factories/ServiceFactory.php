<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $nameService = ['Barbe', 'Coupe de cheveux', 'coloration', 'lissage brésilien', 'tatouage'];

        return [
            'name' => Arr::random($nameService),
            'price' => fake()->randomNumber(2),
            'duration' => fake()->randomNumber(2),
            'description' =>fake()->sentence(10),
        ];
    }
}
