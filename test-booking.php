<?php

require __DIR__.'/vendor/autoload.php';

use Rinvex\Bookings\Models\BookableBooking;

// Simple test without abstract class instantiation
echo "Testing BookableBooking class exists:\n";
echo class_exists('Rinvex\Bookings\Models\BookableBooking') ? 'Success' : 'Failed';
echo "\n";
