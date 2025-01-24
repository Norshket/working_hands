<?php

use App\Http\Controllers\Articles\CreateArticleController;
use App\Http\Controllers\Articles\ListArticleController;
use App\Http\Controllers\Articles\ShowArticleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;



Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/articles/{id}', ShowArticleController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/articles', ListArticleController::class);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/articles/{id}', CreateArticleController::class);
});


