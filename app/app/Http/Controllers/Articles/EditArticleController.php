<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Service\Articles\ArticleService;

class EditArticleController extends Controller
{
    public function __invoke(Article $article, ArticleService $service)
    {
        return response()->json($service->getEditData($article));
    }
}
