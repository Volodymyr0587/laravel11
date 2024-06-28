<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

//% assigning the middleware to route:
Route::get('/restricted/{age}', function ($age) {
    return "You are allowed to access this page. Your age is: $age";
})->middleware('checkAgeMiddleware');


// Use custom helper function to generate random string
Route::get('/generate-random-string', function() {
    return generateRandomString(25);
});

// Fake Person Data
Route::get('/fake-person-data', function () {
    return fake_person_data();
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

// Enums test
Route::get('products', [ProductController::class, 'index']);

// Calendar
Route::get('/calendar', [EventController::class, 'calendar']);
// Single event
Route::get('/event/{event}', [EventController::class, 'show'])->name('event.show');


// User Courses
Route::get('/courses', function () {
    $user = User::find(1);
    // $course = Course::find(1);
    // $user->courses()->attach($course->id);
    $courses = $user->courses;

    foreach ($courses as $course) {
        echo $course->title;
    }
});
