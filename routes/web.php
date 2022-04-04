<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
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

Route::get('/user', function () {
    return view('user');
})->middleware(['auth'])->name('user');

require __DIR__.'/auth.php';

Route::resource('user', UserController::class);
Route::resource('client', ClientController::class);
Route::resource('city', CityController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
