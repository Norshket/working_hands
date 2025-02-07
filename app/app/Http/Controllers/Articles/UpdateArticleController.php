<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\UpdateRequest;
use App\Models\Article;
use App\Service\Articles\ArticleService;

class UpdateArticleController extends Controller
{
    public function __invoke(Article $article, UpdateRequest $request, ArticleService $service)
    {
        return $service->update($article, $request->validated());
    }
}
