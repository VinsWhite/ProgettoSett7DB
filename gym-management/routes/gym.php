<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::resource('/course', CourseController::class)->middleware('auth');
Route::resource('/activity', ActivityController::class)->middleware('auth');
Route::resource('/reservations', ReservationController::class)->middleware('auth');