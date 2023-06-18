<?php

namespace Src\Services;

interface ClassesServiceInterface {
    public function all();
    public function create(array $payload_data);
    public function getClassesOnRange($startDate, $endDate);
    public function isThereClassOnDate($date);
}
