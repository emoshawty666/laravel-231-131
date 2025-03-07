<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
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
//Article
Route::resource('/article',ArticleController::class);


//Auth
Route::get('/auth/signup', [AuthController::class, 'signup']);
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/authenticate', [AuthController::class, 'authenticate']);
Route::post('/auth/registr', [AuthController::class, 'registr']);
Route::get('/auth/logout', [AuthController::class, 'logout']);



Route::get('/', function () {
    return view('layout');
});
