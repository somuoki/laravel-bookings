<?php

namespace Somuoki\Bookings\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ValidatedEvent
{
    use Dispatchable, SerializesModels;

    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
}
