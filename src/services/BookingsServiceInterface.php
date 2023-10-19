<?php

namespace Src\Services;
use Src\Models\Bookings;

interface BookingsServiceInterface {
    public function all();

    public function getById(int $id);
    public function create(array $payload_data);
}
