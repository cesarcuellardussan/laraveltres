<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, X-Token-Auth, Authorization');

// Route::middleware(['cors'])->group(function () {
Route::group(['middleware' => 'cors'], function () {
    Route::group(["prefix" => "orders"], function () {
        Route::get('/',[OrderController::class, 'index']);
        Route::post('/', [OrderController::class, 'store']);
        Route::put('/{id}', [OrderController::class, 'update']);
    });

    Route::group(["prefix" => "ingredients"], function () {
        Route::get('/',[IngredientController::class, 'index']);
        Route::post('/{ingredient_id}/purchase', [PurchaseController::class, 'store']);
    });

    Route::get('/foods/{food}',[FoodController::class, 'show']);
    Route::get('/deposit/{food_id}',[FoodController::class, 'deposit']);
});

