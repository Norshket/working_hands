<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Service\Articles\ArticleService;

class CreateArticleController extends Controller
{
    public function __invoke(ArticleService $service)
    {
        return response()->json($service->getCreateData());
    }
}
