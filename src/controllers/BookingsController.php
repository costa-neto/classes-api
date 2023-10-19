<?php

namespace Src\Controllers;

use Leaf\Http\Status;
use Src\Exceptions\DateOccupiedException;
use Src\Exceptions\InvalidDateException;
use Src\Exceptions\NoClassOnDateException;
use Src\Repositories\BookingsRepository;
use Src\Repositories\ClassesRepository;
use Src\Services\BookingsService;

class BookingsController extends Controller{
    private BookingsRepository $bookingsRepository;
    private ClassesRepository $classesRepository;
    private BookingsService $bookingsService;

    public function __construct() {
        $this->bookingsRepository = new BookingsRepository();
        $this->classesRepository = new ClassesRepository();
        $this->bookingsService = new BookingsService($this->bookingsRepository, $this->classesRepository);
    }

    public function index() {
        $bookings = $this->bookingsService->all();
        response()->json($bookings);
    }

    public function getById(int $id) {
        $booking = $this->bookingsService->getById($id);
        response()->json($booking);
    }

    public function create() {
        try {
            $payload_data = request()->body();
            $booking = $this->bookingsService->create($payload_data);
            return response()->json($booking, Status::HTTP_CREATED);
        } catch(InvalidDateException $err) {
            return response()->json(['message' => $err->getMessage()], Status::HTTP_UNPROCESSABLE_ENTITY);
        } catch (NoClassOnDateException $err) {
            return response()->json(['message' => $err->getMessage()], Status::HTTP_CONFLICT);
        }


    }
}
