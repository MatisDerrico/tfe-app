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

        $types = ['Coiffure', 'Tatouage'];

        return [
            'name' => Arr::random($nameService), // Choisi aléatoirement un élément parmi la liste des services dans ma variable contenant un tableau
            'type' => Arr::random($types),
            'price' => fake()->randomNumber(2),
            'duration' => fake()->randomNumber(2),
            'description' =>fake()->sentence(10),
        ];
    }

    public function barber(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'Coiffure',
            ];
        });
    }

    public function tatoo(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'Tatouage',
            ];
        });
    }
}
