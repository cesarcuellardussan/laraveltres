<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/',[HomeController::class, 'index'])->name('home');
// Route::get('/order',[OrderController::class, 'create'])->name('order');
Route::get('/kitchen',[KitchenController::class, 'index'])->name('kitchen');
Route::get('/warehouse',[WarehouseController::class, 'index'])->name('warehouse');
Route::get('/purchase',[PurchaseController::class, 'index'])->name('purchase');
Route::get('/inventory',[IngredientController::class, 'index'])->name('inventory');
