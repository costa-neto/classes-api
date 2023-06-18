<?php

namespace Src\Repositories;

use Src\Models\Bookings;

interface BookingsRepositoryInterface {
    public function all();
    public function create(Bookings $new_booking);

}
