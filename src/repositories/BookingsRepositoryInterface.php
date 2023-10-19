<?php

namespace Src\Repositories;

use Src\Models\Bookings;

interface BookingsRepositoryInterface {
    public function all();
    public function getById(int $id);
    public function create(Bookings $new_booking);

}
