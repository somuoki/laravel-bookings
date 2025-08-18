<?php

require __DIR__.'/../vendor/autoload.php';

use Illuminate\Database\Eloquent\Model;
use Somuoki\Bookings\Models\Bookable;
use Somuoki\Bookings\Models\BookableBooking;
use Somuoki\Bookings\Models\BookableRate;
use Somuoki\Bookings\Models\BookableAvailability;

// 1. Create a bookable model
class Room extends Model
{
    use \Somuoki\Bookings\Traits\Bookable;

    protected $fillable = ['name', 'description'];

    public function getBookingModel(): string
    {
        return BookableBooking::class;
    }

    public function getRateModel(): string
    {
        return BookableRate::class;
    }

    public function getAvailabilityModel(): string
    {
        return BookableAvailability::class;
    }
}

// 2. Create and save a bookable item
$room = new Room([
    'name' => 'Deluxe Suite',
    'description' => 'Spacious suite with ocean view'
]);
$room->save();

// 3. Add rates for the bookable
$room->rates()->create([
    'rate' => 200.00,
    'currency' => 'USD',
    'unit' => 'night',
    'minimum' => 1,
    'maximum' => 10
]);

// 4. Add availability
$room->availabilities()->create([
    'starts_at' => date('Y-m-d H:i:s'),
    'ends_at' => date('Y-m-d H:i:s', strtotime('+1 year')),
    'is_available' => true
]);

// 5. Create a booking
$booking = $room->bookings()->create([
    'user_id' => 1,
    'starts_at' => date('Y-m-d H:i:s', strtotime('+1 week')),
    'ends_at' => date('Y-m-d H:i:s', strtotime('+1 week +3 days')),
    'quantity' => 1,
    'total' => 600.00,
    'currency' => 'USD'
]);

echo "Created booking #{$booking->id} for {$room->name}";
