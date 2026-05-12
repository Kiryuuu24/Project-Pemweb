<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminBookingController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

Route::middleware(['auth'])
->prefix('admin')
->name('admin.')
->group(function () {

    Route::resource('fields', FieldController::class);

    Route::get('/bookings', [AdminBookingController::class, 'index'])
        ->name('bookings.index');

    Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])
        ->name('bookings.show');

    Route::post('/bookings/{booking}/confirm', [AdminBookingController::class, 'confirm'])
        ->name('bookings.confirm');

    Route::post('/bookings/{booking}/reject', [AdminBookingController::class, 'reject'])
        ->name('bookings.reject');

});

Route::middleware('auth')->group(function () {

    Route::get('/fields', [FieldController::class, 'index'])
        ->name('fields.index');

    Route::get('/booking/history', [BookingController::class, 'history'])
        ->name('booking.history');

    Route::get('/booking/{field}', [BookingController::class, 'create'])
        ->name('booking.create');

    Route::post('/booking', [BookingController::class, 'store'])
        ->name('booking.store');

    Route::get('/booking/{booking}/payment', [PaymentController::class, 'show'])
        ->name('booking.payment');

    Route::post('/booking/{booking}/payment', [PaymentController::class, 'store'])
        ->name('payment.store');

});

require __DIR__.'/auth.php';
