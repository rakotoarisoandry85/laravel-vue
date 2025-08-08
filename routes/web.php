<?php

use App\Http\Controllers\Product\ListProdController;
use App\Http\Controllers\ProductListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Http\Controllers\User\UsersListController::class);
Route::get('/products', \App\Http\Controllers\Product\ProductListController::class);
        /* ROUTES RELIANT AUX COMPONENTS VUE */
Route::view('/users/create', 'users.create')->name('users.create');
Route::view('/products/create', 'products.create')->name('products.create');
Route::view('/products/{id}', 'products.show')->name('products.show');

 //Route::get('employeCfps/{idEmploye}/getReferent', [ModuleController::class, 'getReferent']);
 /* ROUTES RELIANT AU CONTROLLER à une méthode */
Route::get('list-product',[ListProdController::class,'getList']);
