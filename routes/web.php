<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PartnerProfileController;


// ==========================
// Rute User Area
// ==========================

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/events/{event}', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/checkout', [EventController::class, 'checkout'])
    ->name('checkout');

Route::get('/checkout/{event}', [App\Http\Controllers\CheckoutController::class, 'create'])
    ->name('checkout.create');

Route::post('/checkout/{event}', [App\Http\Controllers\CheckoutController::class, 'store'])
    ->name('checkout.store');

Route::get('/my-ticket', [EventController::class, 'ticket'])
    ->middleware('auth')
    ->name('ticket');

Route::get('/ticket/{transaction}', [EventController::class, 'showTicket'])
    ->middleware('auth')
    ->name('ticket.show');

Route::post('/midtrans/callback', [
    \App\Http\Controllers\MidtransWebhookController::class,
    'handle'
]);

Route::get('/login', function () {
    return redirect()->route('google.login');
})->name('login');

Route::get('/payment/{order_id}', [
    \App\Http\Controllers\CheckoutController::class,
    'payment'
])->name('checkout.payment');

Route::get('/success/{order_id}', [
    \App\Http\Controllers\CheckoutController::class,
    'success'
])->name('checkout.success');


// ==========================
// Rute Admin Area
// ==========================

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('login', [AuthController::class, 'login'])
        ->name('login.post');

    Route::post('logout', [AuthController::class, 'logout'])
        ->name('logout');


    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('dashboard', [
            DashboardController::class,
            'index'
        ])->name('dashboard');

        Route::resource('events', AdminEventController::class);

        Route::get('transactions', [
            TransactionController::class,
            'index'
        ])->name('transactions.index');

        Route::resource('categories', CategoryController::class);

        Route::resource('partners', PartnerController::class);
    });


    Route::middleware(['auth','superadmin'])->group(function () {

        Route::resource('organizations', OrganizationController::class);

        Route::resource('users', UserController::class);


        Route::patch(
            '/organizations/{organization}/approve',
            [OrganizationController::class,'approve']
        )->name('organizations.approve');


        Route::patch(
            '/organizations/{organization}/reject',
            [OrganizationController::class,'reject']
        )->name('organizations.reject');

    });

});


// ==========================
// Google Login
// ==========================

Route::get('/auth/google', [
    GoogleController::class,
    'redirect'
])->name('google.login');


Route::get('/auth/google/callback', [
    GoogleController::class,
    'callback'
]);


// ==========================
// Review Feature
// ==========================

Route::get('/events/{event}/reviews', [
    ReviewController::class,
    'index'
])->name('review.index');


Route::middleware('auth')->group(function () {

    Route::get('/review/{event}', [
        ReviewController::class,
        'create'
    ])->name('review.create');


    Route::post('/review', [
        ReviewController::class,
        'store'
    ])->name('review.store');

});