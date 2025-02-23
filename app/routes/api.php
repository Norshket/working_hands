<?php

use App\Http\Controllers\ArticleComments\CreateController as CreateArticleCommentsController;
use App\Http\Controllers\ArticleComments\ListController as ListArticleCommentsController;

use App\Http\Controllers\Articles\CreateController as CreateArticleController;
use App\Http\Controllers\Articles\DeleteController as DeleteArticleController;
use App\Http\Controllers\Articles\EditController as EditArticleController;
use App\Http\Controllers\Articles\ListController as ListArticleController;
use App\Http\Controllers\Articles\ShowController as ShowArticleController;
use App\Http\Controllers\Articles\StoreController as StoreArticleController;
use App\Http\Controllers\Articles\UpdateController as UpdateArticleController;

use App\Http\Controllers\Users\CreateController as CreateUserController;
use App\Http\Controllers\Users\DeleteController as DeleteUserController;
use App\Http\Controllers\Users\EditController as EditUserController;
use App\Http\Controllers\Users\ListController as ListUserController;
use App\Http\Controllers\Users\ShowController as ShowUserController;
use App\Http\Controllers\Users\StoreController as StoreUserController;
use App\Http\Controllers\Users\UpdateController as UpdateUserController;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Tags\ListController as ListTagsController;
use Illuminate\Support\Facades\Route;

Route::get('/main', MainController::class);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::prefix('users')->group(function () {
        Route::get('/', ListUserController::class);
        Route::get('/create', CreateUserController::class);
        Route::get('/{user}', ShowUserController::class);
        Route::get('/{user}/edit', EditUserController::class);
        Route::post('/', StoreUserController::class);
        Route::put('/{user}', UpdateUserController::class);
        Route::delete('/{user}', DeleteUserController::class);
    });

    Route::prefix('articles')->group(function () {
        Route::post('/', StoreArticleController::class);
        Route::get('/create', CreateArticleController::class);

        Route::prefix('/{article}')->group(function () {
            Route::get('/edit', EditArticleController::class);
            Route::put('/', UpdateArticleController::class);
            Route::delete('/', DeleteArticleController::class);
        });
    });
});

Route::prefix('articles')->group(function () {
    Route::get('/', ListArticleController::class);
    Route::get('/{article}', ShowArticleController::class);

    Route::prefix('/{article}/comments')->group(function () {
        Route::get('/', ListArticleCommentsController::class);
        Route::post('/', CreateArticleCommentsController::class);
    });
});

Route::get('tags', ListTagsController::class);


