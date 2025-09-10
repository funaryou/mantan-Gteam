<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\ViewComponentController;
use App\Http\Controllers\Client\SetupController;
use App\Http\Controllers\Client\MenuController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Middleware\CheckTabletSession; 


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [ViewComponentController::class, 'index']);

Route::prefix('/client')->group(function () {
    Route::prefix('/setup')->group(function () {
        Route::get('/', [SetupController::class, 'index'])->name('client.setup.index');
        Route::post('/', [SetupController::class, 'store'])->name('client.setup.store');
    });
    Route::middleware(CheckTabletSession::class)->group(function () {
        Route::prefix('/menu')->group(function () {
            Route::get('/home', [MenuController::class, 'top'])->name('client.menu.top');
            Route::get('/', [MenuController::class, 'index'])->name('client.menu.index');
            Route::get('/search', [MenuController::class, 'search'])->name('client.menu.search');
            Route::get('/{id}', [MenuController::class, 'detail'])->name('client.menu.detail');
            Route::post('/{id}/store', [MenuController::class, 'store'])->name('client.menu.store');  
        });
        Route::prefix('/order')->group(function () {
            Route::get('/cart', [OrderController::class, 'index'])->name('client.order.cart');
            Route::post('/cart', [OrderController::class, 'store'])->name('client.order.store');
            Route::get('/{id}', [OrderController::class, 'detail'])->name('client.order.detail');
        });
        Route::prefix('/payment')->group(function () {
            Route::get('/conf', [PaymentController::class, 'conf'])->name('client.payment.conf');
            Route::get('/services', [PaymentController::class, 'services'])->name('client.payment.services');
            Route::get('/services/{id}', [PaymentController::class, 'payment'])->name('client.payment.payment');
        });
    });
});
