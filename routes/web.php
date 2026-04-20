<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\CategoryController;

// Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/profil', function () {
    return view('profil');
    });

Route::get('/katalog', function () {
    return view('katalog');
    });

Route::get('/bantuan', function () {
    return view('bantuan');
    });

// Event
Route::get('/event/1', [EventController::class, 'show']);
Route::get('/checkout', [EventController::class, 'checkout']);
Route::get('/ticket', [EventController::class, 'ticket']);

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/events', [AdminEventController::class, 'index']);
    Route::get('/transactions', [AdminEventController::class, 'transactions']);
    Route::get('/categories', [CategoryController::class, 'index']); 
});