<?php

use App\Http\Controllers\ArticleComments\CreateArticleCommentController;
use App\Http\Controllers\ArticleComments\ListArticleCommentController;
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

Route::prefix('articles')->group(function () {
    Route::get('/', ListArticleController::class);
    Route::get('/{article}', ShowArticleController::class);

    Route::prefix('/{article}/comments')->group(function () {
        Route::get('/', ListArticleCommentController::class);
        Route::post('/', CreateArticleCommentController::class);
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/articles/{id}', CreateArticleController::class);
});


