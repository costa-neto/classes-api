<?php

namespace Src\Services;
use Src\Models\Bookings;

interface BookingsServiceInterface {
    public function all();
    public function create(array $payload_data);
}
