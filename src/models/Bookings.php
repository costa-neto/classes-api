<?php

namespace Src\Models;

class Bookings extends Model {
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $fillable = ['member_name', 'booking_date'];
    public $timestamps = false;
}
