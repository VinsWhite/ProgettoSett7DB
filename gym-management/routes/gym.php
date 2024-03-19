<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::resource('/gym', CourseController::class)->middleware('auth');