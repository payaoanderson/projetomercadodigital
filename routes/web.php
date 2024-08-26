<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('politica', function () {
    return view('politica');
});
Route::get('template', function () {
    return view('template');
});
