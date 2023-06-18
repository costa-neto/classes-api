<?php

namespace Src\Repositories;
use Src\Models\Classes;

interface ClassesRepositoryInterface {
    public function all();
    public function create(Classes $new_class);
    public function fetchClassesOnRange($startDate, $endDate);
    public function isThereClassOnDate($date);

}
