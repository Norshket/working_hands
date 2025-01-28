<?php

use App\Http\Controllers\Articles\CreateArticleController;
use App\Http\Controllers\Articles\ListArticleController;
use App\Http\Controllers\Articles\ShowArticleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/main', MainController::class);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/articles/{article}/show', ShowArticleController::class);
Route::get('/articles', ListArticleController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/articles/{id}', CreateArticleController::class);
});


