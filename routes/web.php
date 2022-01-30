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
//updateStage
Route::post('/updateStage', [App\Http\Controllers\HomeController::class, 'updateStage'])->name('updateStage');
//verifyPayment
Route::get('/verifyPayment', [App\Http\Controllers\HomeController::class, 'handleGatewayCallback']);
//webhook to verifyPayment
Route::get('/paystackWebhook', [App\Http\Controllers\HomeController::class, 'paystackWebhook']);
//createEdition
Route::post('/createEdition', [App\Http\Controllers\HomeController::class, 'createEdition'])->name('createEdition');
//activateEdition
Route::get('/activateEdition/{id}', [App\Http\Controllers\HomeController::class, 'activateEdition'])->name('activateEdition');

