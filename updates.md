# Laravel Bookings Package Updates

This document tracks planned improvements and their implementation status.

## Phase 1: Core Functionality Improvements

### 1. Price Calculation Refactor
- [ ] Complete TODO in BookableBooking.php boot method
- [ ] Implement proper rate integration
- [ ] Add validation for rate application
- [ ] Update calculatePrice method to use rates

### 2. Availability Enforcement
- [ ] Integrate availability checks during booking creation
- [ ] Add availability validation rules
- [ ] Implement priority-based availability resolution

### 3. Unit Enforcement
- [ ] Enforce minimum_units during booking
- [ ] Enforce maximum_units during booking
- [ ] Add validation messages for unit violations

### 4. Basic Cancellation
- [ ] Maintain canceled_at status
- [ ] Add cancellation reason field
- [ ] Add scope for active/non-canceled bookings

## Phase 2: Enhanced Features

### 1. Booking Approval Workflows
- [ ] Add status field (pending/approved/rejected)
- [ ] Add approval workflow events
- [ ] Implement approval scopes

### 2. Resource Categorization
- [ ] Add categories/tags system
- [ ] Implement category-based filtering
- [ ] Add category management traits

### 3. Waitlist Management
- [ ] Create waitlist model
- [ ] Implement capacity-based waitlisting
- [ ] Add notification system for openings

### 4. Blackout Dates
- [ ] Add blackout date model
- [ ] Implement blackout date checks
- [ ] Add admin interface for management

## Phase 3: Advanced Features

### 1. Recurring Bookings
- [ ] Add recurrence patterns
- [ ] Implement recurrence rule parsing
- [ ] Add recurrence exception handling

### 2. Minimum Notice Requirements
- [ ] Add notice period settings
- [ ] Implement notice validation
- [ ] Add configuration options

### 3. Dynamic Availability
- [ ] Add dynamic availability rules
- [ ] Implement rule evaluation engine
- [ ] Add admin interface for rules

## Tracking

| Phase | Feature                | Status     | Notes                  |
|-------|------------------------|------------|------------------------|
| 1     | Price Calculation      | Not Started|                        |
| 1     | Availability           | Not Started|                        |
| 1     | Unit Enforcement       | Not Started|                        |
| 1     | Basic Cancellation     | Not Started|                        |
| 2     | Approval Workflows     | Not Started|                        |
| 2     | Resource Categorization| Not Started|                        |
| 2     | Waitlist Management    | Not Started|                        |
| 2     | Blackout Dates         | Not Started|                        |
| 3     | Recurring Bookings     | Not Started|                        |
| 3     | Minimum Notice         | Not Started|                        |
| 3     | Dynamic Availability   | Not Started|                        |
