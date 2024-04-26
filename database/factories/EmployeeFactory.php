<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['Coiffure', 'Tatouage'];

        return [
            'name' => fake()->name(),
            'type' => Arr::random($types),
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
