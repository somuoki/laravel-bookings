# Laravel Bookings Testing Plan

## Test Scope
Focusing only on currently implemented functionality in:
- Bookable model
- BookableBooking model  
- BookableRate model
- BookableAvailability model
- Core traits and relationships

## Test Categories

### 1. Bookable Model Tests
- Basic CRUD operations
- Validation rules:
  - Required fields (name, base_cost, unit_cost)
  - Unit type validation
  - Currency format
- Status transitions (active/inactive)
- Slug generation

### 2. Booking Creation Tests
- Date validation:
  - Start before end
  - Future dates required
- Price calculation:
  - Base + unit cost
  - Different unit types (hour, day)
- Status management:
  - Active by default
  - Cancellation marking
- Relationship validation:
  - Requires bookable
  - Requires customer

### 3. Rate Model Tests  
- Basic CRUD operations
- Validation:
  - Required fields
  - Valid range types
  - From/to consistency
- Association with bookables
- Priority ordering

### 4. Availability Model Tests
- Basic CRUD operations
- Validation:
  - Required fields
  - Valid range types  
  - From/to consistency
- Bookable flag behavior
- Priority ordering

### 5. Trait Tests
- BookingScopes:
  - Past/future/current filters
  - Cancellation filters
- HasBookings:
  - Relationship methods
  - Booking counts

## Test Organization

```
tests/
├── Feature/
│   ├── BookableTest.php
│   ├── BookingTest.php  
│   ├── RateTest.php
│   └── AvailabilityTest.php
└── Unit/
    ├── Traits/
    │   ├── BookingScopesTest.php
    │   └── HasBookingsTest.php
    └── Models/
        ├── BookableTest.php
        └── BookableBookingTest.php
```

## Example Test Cases

```php
// BookableTest.php
public function test_requires_name_and_costs()
{
    $this->expectException(ValidationException::class);
    Bookable::create([]);
}

// BookingTest.php  
public function test_calculates_price_for_hours()
{
    $bookable = Bookable::factory()->create([
        'unit' => 'hour',
        'base_cost' => 10,
        'unit_cost' => 5
    ]);
    
    $booking = BookableBooking::create([
        'bookable_id' => $bookable->id,
        'starts_at' => now(),
        'ends_at' => now()->addHours(2),
        // ... other required fields
    ]);
    
    $this->assertEquals(20, $booking->price); // 10 + (5 * 2)
}
```

## Next Steps
1. Implement test database migrations
2. Create model factories
3. Write initial test classes
4. Expand test coverage iteratively
