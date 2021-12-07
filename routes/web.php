<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routens
|--------------------------------------------------------------------------
*/


Auth::routes();
Route::get('/', fn() => view('auth.login'));
Route::get('/articles', [ArticleController::class, 'index'] )->name('articles');
Route::get('/articles/create', [ArticleController::class, 'create']);
Route::post('articles/store', [ArticleController::class, 'store']);
Route::get('/articles/show/{id}', [ArticleController::class, 'show']);
Route::get('/articles/destroy/{id}', [ArticleController::class, 'destroy']);
Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);
Route::post('/articles/{id}', [ArticleController::class, 'update']);
