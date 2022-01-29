<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registration/{category}', [App\Http\Controllers\WelcomeController::class, 'registration'])->name('registration');

//pages routes
Route::get('/editions', [App\Http\Controllers\WelcomeController::class, 'editions'])->name('editions');
Route::get('/candidates', [App\Http\Controllers\WelcomeController::class, 'candidates'])->name('candidates');
Route::get('/contestants', [App\Http\Controllers\WelcomeController::class, 'contestants'])->name('contestants');
Route::get('/payments', [App\Http\Controllers\WelcomeController::class, 'payments'])->name('payments');
Route::get('/votes', [App\Http\Controllers\WelcomeController::class, 'votes'])->name('votes');