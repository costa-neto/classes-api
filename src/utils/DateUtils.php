<?php

namespace Src\Utils;
use DateTime;
use Leaf\Log;

class DateUtils {
    private const Format = 'd/m/Y';
    public static function validateDate($date) : bool {
        $d = DateTime::createFromFormat(DateUtils::Format, $date);
        return $d && $d->format(DateUtils::Format) == $date;
    }

    public static function validateStartAndEndDate($startDate, $endDate) : bool {
        $start = DateTime::createFromFormat(DateUtils::Format, $startDate);
        $end = DateTime::createFromFormat(DateUtils::Format, $endDate);

        return $end >= $start;
    }
}
