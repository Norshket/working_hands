<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Service\Articles\ArticleService;
use Symfony\Component\HttpFoundation\JsonResponse;

class DeleteController extends Controller
{
    public function __invoke(Article $article, ArticleService $service): JsonResponse
    {
        $this->authorize('delete', $article);

        return response()->json($service->delete($article));
    }
}
