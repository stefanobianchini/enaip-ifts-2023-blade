<?php

use App\Http\Controllers\HotelController;
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


Route::get('/', [
        \App\Http\Controllers\HomeController::class,
    'home'
]);

Route::get('/hotels', [
        \App\Http\Controllers\HotelController::class,
    'index'
]);

Route::get('/hotels/delete/{id}', [
        \App\Http\Controllers\HotelController::class,
    'delete'
]);

Route::get('/hotels/create', [
        \App\Http\Controllers\HotelController::class,
    'create'
]);

Route::post('/hotels/create', [
        \App\Http\Controllers\HotelController::class,
    'save'
]);

Route::get('/hotels/edit/{id}', [
        \App\Http\Controllers\HotelController::class,
    'edit'
]);

Route::post('/hotels/edit/{id}', [
        \App\Http\Controllers\HotelController::class,
    'update'
]);