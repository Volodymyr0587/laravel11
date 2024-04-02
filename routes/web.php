<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//% assigning the middleware to route:
Route::get('/restricted/{age}', function ($age) {
    return "You are allowed to access this page. Your age is: $age";
})->middleware('checkAgeMiddleware');


// Use custom helper function to generate random string
Route::get('/generate-random-string', function() {
    return generateRandomString(25);
});
