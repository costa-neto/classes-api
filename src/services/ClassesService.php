<?php

namespace Src\Services;

use Src\Exceptions\DateOccupiedException;
use Src\Models\Classes;
use Src\Repositories\ClassesRepository;
use Src\Utils\DateUtils;

class ClassesService implements ClassesServiceInterface {
    private ClassesRepository $classesRepository;

    public function __construct(ClassesRepository $classesRepository) {
        $this->classesRepository = $classesRepository;
    }

    public function all() {
        return $this->classesRepository->all();
    }

    public function create(array $payload_data) {
        $new_class = Classes::ClassBuilder($payload_data);
        if(count($this->getClassesOnRange($new_class->start_date, $new_class->end_date)) > 0) {
            throw new DateOccupiedException("this date is already occupied");
        }
        return $this->classesRepository->create($new_class);
    }

    public function getClassesOnRange($startDate, $endDate) {
        return $this->classesRepository->fetchClassesOnRange($startDate, $endDate);
    }

    public function isThereClassOnDate($date) {
        return $this->classesRepository->isThereClassOnDate($date);
    }
}
