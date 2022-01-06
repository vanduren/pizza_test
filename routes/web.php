<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemPizzaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UnitController;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'checkLogin'])->name('checkLogin');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('item', ItemController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('pizza', PizzaController::class);
    Route::resource('item_pizza', ItemPizzaController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('order', OrderController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/test',function(){
    dd(Gate::allows('isAdmin', auth()->user()));
    dd(auth()->user());
//    return view('welcome');
})->middleware('auth');
Route::get('/test2',function(){
    // using db query instead of eloquent
    $orders = DB::table('orders')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->select('*')
        ->get();
    dd($orders);
})->middleware('auth');
require __DIR__.'/auth.php';
