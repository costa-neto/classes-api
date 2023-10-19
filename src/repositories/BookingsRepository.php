<?php

namespace Src\Repositories;

use Src\Models\Bookings;

class BookingsRepository implements BookingsRepositoryInterface {
    public function all() {
        return Bookings::all();
    }

    public function getById(int $id): Bookings{
        return Bookings::where('id', $id)->first();
    }

    public function create(Bookings $new_booking) {
        try {
            $new_booking->save();
            return $new_booking;
        } catch(\Exception $err) {
            print_r($err->getMessage());
            return null;
        }
    }
}
