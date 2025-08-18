<?php

namespace Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Somuoki\Bookings\Models\Bookable;

class BookableFactory extends Factory
{
    protected $model = Bookable::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'is_active' => true,
            'base_cost' => $this->faker->randomFloat(2, 10, 100),
            'unit_cost' => $this->faker->randomFloat(2, 5, 50),
            'currency' => 'USD',
            'unit' => $this->faker->randomElement(['hour', 'day']),
            'maximum_units' => $this->faker->numberBetween(1, 10),
            'minimum_units' => 1,
            'is_cancelable' => true,
            'is_recurring' => false,
            'capacity' => $this->faker->numberBetween(1, 20),
        ];
    }

    public function inactive()
    {
        return $this->state([
            'is_active' => false,
        ]);
    }
}
