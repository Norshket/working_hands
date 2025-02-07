<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Resources\Articles\ShowResource;
use App\Models\Article;
use App\Service\Articles\ArticleService;

class ShowArticleController extends Controller
{
    public function __invoke(Article $article, ArticleService $services)
    {
        return new ShowResource($services->show($article));
    }
}
