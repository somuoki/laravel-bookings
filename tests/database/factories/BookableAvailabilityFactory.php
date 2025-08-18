<?php

namespace Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Somuoki\Bookings\Models\BookableAvailability;

class BookableAvailabilityFactory extends Factory
{
    protected $model = BookableAvailability::class;

    public function definition()
    {
        return [
            'range' => $this->faker->randomElement(['date', 'day', 'time']),
            'from' => $this->faker->time('H:i'),
            'to' => $this->faker->time('H:i'),
            'is_bookable' => true,
            'priority' => $this->faker->numberBetween(1, 10),
        ];
    }

    public function notBookable()
    {
        return $this->state([
            'is_bookable' => false,
        ]);
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
