<?php
app()->get('/classes', 'ClassesController@index');

app()->post('/classes', 'ClassesController@create');

app()->get('/bookings', 'BookingsController@index');

app()->post('/bookings', 'BookingsController@create');
