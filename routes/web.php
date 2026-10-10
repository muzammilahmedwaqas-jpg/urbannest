<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TicketTypeController;
use App\Http\Controllers\PublicEventController;
use App\Http\Controllers\TicketRegistrationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicEventController::class, 'index'])->name('events.index');
Route::get('/events', [PublicEventController::class, 'index'])->name('events.index.list');
Route::get('/events/{event}', [PublicEventController::class, 'show'])->name('events.show');

Route::middleware('auth')->group(function () {
    Route::post('/events/{event}/register', [TicketRegistrationController::class, 'store'])->name('tickets.register');
    Route::get('/tickets/{ticket}/confirmation', [TicketRegistrationController::class, 'confirmation'])->name('tickets.confirmation');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', EventController::class);
    Route::resource('ticket-types', TicketTypeController::class);
});

require __DIR__.'/auth.php';
