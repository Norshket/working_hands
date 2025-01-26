<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Resources\Articles\ShowResource;
use App\Models\Article;
use App\Service\Articles\ArticleServices;

class ShowArticleController extends Controller
{
    public function __invoke(Article $article, ArticleServices $services)
    {
        return new ShowResource($services->show($article));
    }
}
