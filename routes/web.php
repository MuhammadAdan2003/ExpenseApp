<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Users.User_pages.home');
})->name('home');
Route::get('/about', function () {
    return view('Users.User_pages.about');
})->name('about');

Route::get('/features', function () {
    return view('Users.User_pages.features');
})->name('feature');

Route::get('/contact', function () {
    return view('Users.User_pages.contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('Users.User_pages.dashboard');
})->name('dashboard');

// Route::get('/register', function () {
//     return view('Users.Auth.register');
// });

Route::get('/register', [AuthController::class, 'index'])->name('showSignup');

Route::get('/login', function () {
    return view('Users.Auth.login');
})->name('showLogin');

// Route::get('/trips', function () {

// });

Route::get('/addTrip', [TripController::class, 'index'])->name('viewFormTrip');
Route::get('/trips', [TripController::class, 'trips'])->name('showtrips');
Route::post('/trips', [TripController::class, 'store'])->name('tripstore');
Route::get('/trip/{id}', [TripController::class, 'trip'])->name('trip');

Route::post('/signup', [AuthController::class, 'register'])->name('signup');
Route::post('/signin', [AuthController::class, 'login'])->name('loginn');
Route::get('/logout', [AuthController::class, 'logout'])->name('logouts');
