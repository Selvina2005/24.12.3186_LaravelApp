<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController as AdminEventControllerCRUD;
use App\Http\Controllers\Admin\TransactionController;

// ======================
// PUBLIC
// ======================

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

// Event Public
Route::get('/events/{event}', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/ticket', [EventController::class, 'ticket']);

// ======================
// CHECKOUT
// ======================

Route::get('/checkout/{event}', [CheckoutController::class, 'create'])
    ->name('checkout.create');

Route::post('/checkout/{event}', [CheckoutController::class, 'store'])
    ->name('checkout.store');


// ======================
// AUTH ADMIN
// ======================

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->middleware('guest')
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});


// ======================
// ADMIN AREA
// ======================

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        // Transactions
        Route::get('/transactions', [TransactionController::class, 'index'])
            ->name('transactions.index');

        // Category CRUD
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('/categories/create', [CategoryController::class, 'create']);
        Route::post('/categories', [CategoryController::class, 'store']);

        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
        Route::put('/categories/{id}', [CategoryController::class, 'update']);

        Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
});


// ======================
// EVENT CRUD
// ======================

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {

        Route::resource('events', AdminEventControllerCRUD::class);

});


// ======================
// PARTNER CRUD
// ======================

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::resource('partners', PartnerController::class);

});