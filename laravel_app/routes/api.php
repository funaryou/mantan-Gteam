<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuSearchController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/client')->group(function () {
    Route::prefix('/menu')->group(function () {
        Route::post('/search/{BigCategoryId}/{SubCategoryId}', [MenuSearchController::class, 'search'])->name('client.menu.search');
    });
});