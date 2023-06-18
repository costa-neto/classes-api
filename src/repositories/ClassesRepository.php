<?php

namespace Src\Repositories;

use Illuminate\Database\Query\Builder;
use Leaf\Db;
use Src\Models\Classes;


class ClassesRepository implements ClassesRepositoryInterface {
    public function all() {
        return Classes::All();
    }

    public function create(Classes $new_class): ?Classes {
        try {
            $new_class->save();
            return $new_class;
        } catch (\Exception $err) {
            print_r($err->getMessage());
            return null;
        }
    }

    public function fetchClassesOnRange($startDate, $endDate) {
        $classesQuery = Classes::query()->whereRaw('start_date <= ? AND end_date >=?',[$startDate, $endDate]);
        return $classesQuery->get();
    }

    public function isThereClassOnDate($date) {
        $class = Classes::query()->whereRaw('start_date <= ? AND end_date >=?',[$date, $date])->get();
        return count($class) > 0;
    }
}
