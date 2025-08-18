<?php

namespace Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Somuoki\Bookings\Models\BookableRate;

class BookableRateFactory extends Factory
{
    protected $model = BookableRate::class;

    public function definition()
    {
        return [
            'range' => $this->faker->randomElement(['date', 'day', 'time']),
            'from' => $this->faker->time('H:i'),
            'to' => $this->faker->time('H:i'),
            'base_cost' => $this->faker->randomFloat(2, 10, 50),
            'unit_cost' => $this->faker->randomFloat(2, 5, 20),
            'priority' => $this->faker->numberBetween(1, 10),
        ];
    }

    public function dateRange()
    {
        return $this->state([
            'range' => 'date',
            'from' => $this->faker->date(),
            'to' => $this->faker->date(),
        ]);
    }
}
