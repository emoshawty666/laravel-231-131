<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
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
Route::resource('/article', ArticleController::class)->middleware('auth:sanctum');
Route::get('article/{article}', [ArticleController::class, 'show'])->name('article.show')->middleware('show');

//comments
Route::controller(CommentController::class)->middleware('auth:sanctum')->prefix('/comments')
        ->group(function(){
            Route::post('', 'store');
            Route::get('/{comment}/edit','edit');
            Route::post('/{comment}','update');
            Route::get('/{comment}/delete','delete');
        }
);

//Auth
Route::get('/auth/signup', [AuthController::class, 'signup']);
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/authenticate', [AuthController::class, 'authenticate']);
Route::post('/auth/registr', [AuthController::class, 'registr']);
Route::get('/auth/logout', [AuthController::class, 'logout']);



Route::get('/', function () {
    return view('layout');
});
