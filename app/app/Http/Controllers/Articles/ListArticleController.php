<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\ListRequest;
use App\Service\Articles\ArticleService;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListArticleController extends Controller
{
    public function __invoke(ListRequest $request, ArticleService $services): JsonResponse
    {
        return response()->json($services->getIndexData($request->validated()));
    }
}
