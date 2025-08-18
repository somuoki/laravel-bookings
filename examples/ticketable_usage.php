<?php

require __DIR__.'/../vendor/autoload.php';

use Illuminate\Database\Eloquent\Model;
use Somuoki\Bookings\Models\Ticketable;
use Somuoki\Bookings\Models\TicketableBooking;

// 1. Create a ticketable model
class Event extends Model
{
    use \Somuoki\Bookings\Traits\Ticketable;

    protected $fillable = ['name', 'description'];

    public function getTicketModel(): string
    {
        return TicketableBooking::class;
    }

    public function getBookingModel(): string
    {
        return TicketableBooking::class;
    }
}

// 2. Create and save a ticketable item
$event = new Event([
    'name' => 'Music Festival',
    'description' => 'Annual summer music festival'
]);
$event->save();

// 3. Create ticket bookings (tickets) for the event
$ticket = $event->bookings()->create([
    'ticket_id' => 1, // Assuming ticket type ID
    'customer_id' => 1,
    'paid' => 150.00,
    'currency' => 'USD',
    'is_approved' => true
]);

// 4. Create another booking
$booking = $event->bookings()->create([
    'ticket_id' => 2, // Different ticket type
    'customer_id' => 2,
    'paid' => 300.00,
    'currency' => 'USD',
    'is_approved' => true
]);

echo "Created booking #{$booking->id} for {$event->name}";
