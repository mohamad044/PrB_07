<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MessageController;

// Display list of clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

// Display list of services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

// Contact routes
Route::get('/contact', [MessageController::class, 'showForm'])->name('contact');
Route::post('/contact', [MessageController::class, 'store'])->name('contact.store');

// Admin routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/clients', [ClientController::class, 'adminIndex'])->name('admin.clients.index');
    Route::get('/admin/services', [ServiceController::class, 'adminIndex'])->name('admin.services.index');
    Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');
});

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('home');
