<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ExpenseController;
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

// ============ TRIP ROUTES ============ //
Route::get('/addTrip', [TripController::class, 'index'])->name('viewFormTrip');
Route::get('/trips', [TripController::class, 'trips'])->name('showtrips');
Route::post('/trips', [TripController::class, 'store'])->name('tripstore');
Route::get('/mytrip/{id}', [TripController::class, 'trip'])->name('myttrip');

// ========== AUTH ROUTES ========= //
Route::post('/signup', [AuthController::class, 'register'])->name('signup');
Route::post('/signin', [AuthController::class, 'login'])->name('loginn');
Route::get('/logout', [AuthController::class, 'logout'])->name('logouts');

// ========== EXPENSE ROUTES ========= //
Route::post('addExp', [ExpenseController::class , 'addExp'])->name('addingExp');
Route::get('getExp/{trip_id}', [ExpenseController::class , 'exp'])->name('gettingExp');
Route::delete('/delTrip/{expense_id}' , [ExpenseController::class , 'destroy'])->name('deleteExp');