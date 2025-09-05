<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ViewComponentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [ViewComponentController::class, 'index']);
