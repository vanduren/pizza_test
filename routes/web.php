<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemPizzaController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UnitController;
use App\Models\Unit;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('item', ItemController::class);
Route::resource('unit', UnitController::class);
Route::resource('pizza', PizzaController::class);
Route::resource('item_pizza', ItemPizzaController::class);
