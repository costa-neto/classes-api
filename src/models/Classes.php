<?php

namespace Src\Models;
use Src\Exceptions\InvalidDateException;
use Src\Utils\DateUtils;

class Classes extends Model {
    protected $table = 'classes';
    protected $primaryKey = 'id';
    protected $fillable = ['class_name', 'start_date', 'end_date', 'capacity'];
    public $timestamps = false;

    public static function ClassBuilder(array $data) : Classes {
        $new_class = new Classes;
        $new_class->class_name = $data['class_name'];
        if(DateUtils::validateDate($data['start_date'])) {
            $new_class->start_date = $data['start_date'];
        } else {
            throw new InvalidDateException("invalid Start Date");
        }
        if(DateUtils::validateDate($data['end_date'])) {
            $new_class->end_date = $data['end_date'];
        } else {
            throw new InvalidDateException("invalid End Date");
        }

        if(!DateUtils::validateStartAndEndDate($new_class->start_date, $new_class->end_date)) {
            throw new InvalidDateException("start date should be before end date");
        }
        $new_class->capacity = $data['capacity'];

        return $new_class;
    }
}
