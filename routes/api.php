<?php

use App\Http\Controllers\Api\Product\IndexProductController;
use App\Http\Controllers\Api\Product\PatchProductController;
use App\Http\Controllers\Api\Product\ShowController as ProductShowController;
use App\Http\Controllers\Api\Product\StoreProductController;
use App\Http\Controllers\Api\User\DeleteController;
use App\Http\Controllers\Api\User\IndexController;
use App\Http\Controllers\Api\User\ShowController;
use App\Http\Controllers\Api\User\StoreAvatarController;
use App\Http\Controllers\Api\User\StoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')
    ->as('users.')
    ->group(function () {
        Route::get('/', IndexController::class)->name('index.user');
        Route::get('/{user}', ShowController::class)->name('show.user');
        Route::post('/create', StoreController::class)->name('store.user');
        Route::delete('/{id}/delete', DeleteController::class)->name('delete.user');
        Route::patch('/{id}/upload-profile', StoreAvatarController::class)->name('updateAvatar.user');
    });
Route::prefix('products')
    ->as('products.')
    ->group(function () {
        Route::get('/', IndexProductController::class)->name('index.user');
        Route::get('/{product}', ProductShowController::class)->name('show.user');
        Route::post('/create', StoreProductController::class)->name('store.product');
        Route::patch('/update', PatchProductController::class)->name('patch.product');
    });
