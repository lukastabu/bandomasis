<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController as R;
use App\Http\Controllers\FoodController as F;
use App\Http\Controllers\FrontController as FC;
use App\Http\Controllers\OrderController as O;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// FRONT ROUTER

Route::get('', [FC::class, 'index'])->name('front-index');

Route::get('/rate/{food}', [FC::class, 'rate'])->name('front-rate')->middleware('rw:user');

Route::put('/rated/{food}', [FC::class, 'update'])->name('front-update')->middleware('rw:user');



// RESTAURANT ROUTERS

Route::get('/restaurants', [R::class, 'index'])->name('restaurant-index')->middleware('rw:admin');

Route::get('/restaurants/create', [R::class, 'create'])->name('restaurant-create')->middleware('rw:admin');

Route::post('/restaurants', [R::class, 'store'])->name('restaurant-store')->middleware('rw:admin');

Route::get('/restaurants/edit/{restaurant}', [R::class, 'edit'])->name('restaurant-edit')->middleware('rw:admin');

Route::put('/restaurants/{restaurant}', [R::class, 'update'])->name('restaurant-update')->middleware('rw:admin');

Route::delete('/restaurants/{restaurant}', [R::class, 'destroy'])->name('restaurant-delete')->middleware('rw:admin');

Route::get('/restaurants/show/{id}', [R::class, 'show'])->name('restaurant-show')->middleware('rw:user');


// FOOD ROUTERS

Route::get('/food', [F::class, 'index'])->name('food-index')->middleware('rw:admin');

Route::get('/food/create', [F::class, 'create'])->name('food-create')->middleware('rw:admin');

Route::post('/food', [F::class, 'store'])->name('food-store')->middleware('rw:admin');

Route::get('/food/edit/{food}', [F::class, 'edit'])->name('food-edit')->middleware('rw:admin');

Route::put('/food/{food}', [F::class, 'update'])->name('food-update')->middleware('rw:admin');

Route::delete('/food/{food}', [F::class, 'destroy'])->name('food-delete')->middleware('rw:admin');

Route::get('/food/show/{id}', [F::class, 'show'])->name('food-show')->middleware('rw:user');


// ORDER ROUTERS

Route::get('/orders', [O::class, 'index'])->name('order-index')->middleware('rw:admin');

Route::put('/status/{order}', [O::class, 'statusChange'])->name('order-status')->middleware('rw:admin');

