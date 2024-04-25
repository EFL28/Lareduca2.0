<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CourseManagement;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/courses/management', CourseManagement::class)->name('course-management');


Route::get('/courses/add', CourseManagement::class)->name('course-form');
