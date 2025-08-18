<?php

namespace Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Somuoki\Bookings\Models\BookableBooking;

class BookableBookingFactory extends Factory
{
    protected $model = BookableBooking::class;

    public function definition()
    {
        return [
            'starts_at' => $this->faker->dateTimeBetween('+1 day', '+1 week'),
            'ends_at' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'price' => $this->faker->randomFloat(2, 50, 500),
            'quantity' => $this->faker->numberBetween(1, 5),
            'total_paid' => function (array $attributes) {
                return $attributes['price'] * $attributes['quantity'];
            },
            'currency' => 'USD',
            'canceled_at' => null,
        ];
    }

    public function canceled()
    {
        return $this->state([
            'canceled_at' => $this->faker->dateTimeThisYear(),
        ]);
    }
}
