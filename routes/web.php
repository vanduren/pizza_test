<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemPizzaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UnitController;
use App\Models\Unit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'checkLogin'])->name('checkLogin');
Route::resource('item', ItemController::class);
Route::resource('unit', UnitController::class);
Route::resource('pizza', PizzaController::class);
Route::resource('item_pizza', ItemPizzaController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
