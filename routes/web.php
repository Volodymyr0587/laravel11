<?php

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


