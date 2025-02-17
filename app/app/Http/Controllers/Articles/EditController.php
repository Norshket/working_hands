<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Service\Articles\ArticleService;
use Symfony\Component\HttpFoundation\JsonResponse;

class EditController extends Controller
{
    public function __invoke(Article $article, ArticleService $service): JsonResponse
    {
        return response()->json($service->getEditData($article));
    }
}
