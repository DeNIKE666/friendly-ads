<?php


Route::get('/', function () {
    return view('layouts.cabinet');
});

Route::get('/admin', function () {
    return view('layouts.admin');
});

Auth::routes();

