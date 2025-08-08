<?php

use App\Http\Controllers\Api\Product\IndexProductController;
use App\Http\Controllers\Api\Product\PatchProductController;
use App\Http\Controllers\Api\Product\ShowController as ProductShowController;
use App\Http\Controllers\Api\Product\StoreProductController;
use App\Http\Controllers\Api\User\IndexController;
use App\Http\Controllers\Api\User\ShowController;
use App\Http\Controllers\Api\User\StoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')
    ->as('users.')
    ->group(function () {
        Route::get('/', IndexController::class)->name('index');
        Route::get('/{user}', ShowController::class)->name('show');
        Route::post('/', StoreController::class)->name('store');
    });
Route::prefix('products')
    ->as('products.')
    ->group(function () {
        Route::get('/list', IndexProductController::class)->name('index');
        Route::get('/{product}', ProductShowController::class)->name('show');
        Route::post('/create', StoreProductController::class)->name('store.product');
        Route::patch('/update', PatchProductController::class)->name('patch.product');
    });
