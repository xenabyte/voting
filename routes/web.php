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
Route::get('/editions', [App\Http\Controllers\HomeController::class, 'editions'])->name('editions');
Route::get('/candidates', [App\Http\Controllers\HomeController::class, 'candidates'])->name('candidates');
Route::get('/contestants', [App\Http\Controllers\HomeController::class, 'contestants'])->name('contestants');
Route::get('/payments', [App\Http\Controllers\HomeController::class, 'payments'])->name('payments');
Route::get('/votes', [App\Http\Controllers\HomeController::class, 'votes'])->name('votes');

//functional Routes
//addCandidates
Route::post('/addCandidates', [App\Http\Controllers\WelcomeController::class, 'addCandidates'])->name('addCandidates');