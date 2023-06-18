<?php

namespace Src\Services;

use Src\Exceptions\InvalidDateException;
use Src\Exceptions\NoClassOnDateException;
use Src\Models\Bookings;
use Src\Repositories\BookingsRepository;
use Src\Repositories\ClassesRepository;
use Src\Utils\DateUtils;

class BookingsService implements BookingsServiceInterface {
    private BookingsRepository $bookingsRepository;
    private ClassesRepository $classesRepository;

    public function __construct(BookingsRepository $bookingsRepository, ClassesRepository $classesRepository) {
        $this->bookingsRepository = $bookingsRepository;
        $this->classesRepository = $classesRepository;
    }

    public function all() {
        return $this->bookingsRepository->all();
    }

    public function create(array $payload_data){
        $new_booking = new Bookings;
        $new_booking->member_name = $payload_data['member_name'];
        if(DateUtils::validateDate($payload_data['booking_date'])) {
            $new_booking->booking_date = $payload_data['booking_date'];
        } else {
            throw new InvalidDateException("invalid Booking Date");
        }

        if(!$this->classesRepository->isThereClassOnDate($new_booking->booking_date)) {
            throw new NoClassOnDateException("there is no class scheduled for this date");
        }

        return $this->bookingsRepository->create($new_booking);
    }
}
