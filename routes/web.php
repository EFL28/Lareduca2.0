<?php

use App\Livewire\CourseForm;
use Illuminate\Support\Facades\Route;
use App\Livewire\CourseManagement;
use App\Livewire\UsersManagement;
use App\Livewire\AssignmentsManagement;
use App\Livewire\AssignmentForm;
use App\Livewire\UsersForm;
use App\Livewire\AssignmentSubmissions;
use App\Livewire\EducationalGamesIntegration;


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
Route::get('/users/management', UsersManagement::class)->name('users-management');
Route::get('/assignments/management', AssignmentsManagement::class)->name('assignments-management');

Route::get('/courses/add', CourseForm:: class)->name('course-form');
Route::get('/users/add', UsersForm:: class)->name('user-form');
Route::get('/assignments/add', AssignmentForm:: class)->name('assignment-form');

Route::get('/assignments/submissions/{id}', AssignmentSubmissions::class)->name('assignment-submissions');

Route::get('/games', EducationalGamesIntegration::class)->name('games');
