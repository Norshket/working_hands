<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Resources\Articles\ItemResource;
use App\Models\Article;
use App\Service\Articles\ArticleService;

class ShowController extends Controller
{
    public function __invoke(Article $article, ArticleService $services)
    {
        return ItemResource::make($services->show($article));
    }
}
