<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Service\Articles\ArticleService;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreateController extends Controller
{
    public function __invoke(ArticleService $service): JsonResponse
    {
        $this->authorize('create', Article::class);

        return response()->json($service->getCreateData());
    }
}
