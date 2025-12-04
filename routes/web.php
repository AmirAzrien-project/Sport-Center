<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportsCenterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Home route
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// About routes
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Profile routes
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

// Sports Center routes
Route::resource('sports_centers', SportsCenterController::class);
Route::get('/sports_centers', [SportsCenterController::class, 'index'])->name('sports_centers.index');
Route::get('/sports_centers/{id}', [SportsCenterController::class, 'show'])->name('sports_centers.show');

// Booking routes
Route::resource('bookings', BookingController::class);
/*Route::middleware(['auth'])->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    Route::middleware(['admin'])->group(function () {
        Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
        Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
        Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    });
});*/
Route::middleware(['auth'])->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::put('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::match(['post', 'put'], '/bookings/{booking}/approve', [BookingController::class, 'approve'])->name('bookings.approve');
});

// Sport routes
Route::resource('sports', SportController::class);
Route::get('/sports', [SportController::class, 'index'])->name('sports.index');
Route::get('/sports/create', [SportController::class, 'create'])->name('sports.create');
Route::post('/sports', [SportController::class, 'store'])->name('sports.store');
Route::get('/sports/{id}', [SportController::class, 'show'])->name('sports.show');
Route::get('/sports/{id}/edit', [SportController::class, 'edit'])->name('sports.edit');
Route::put('/sports/{id}', [SportController::class, 'update'])->name('sports.update');
Route::delete('/sports/{id}', [SportController::class, 'destroy'])->name('sports.destroy');
