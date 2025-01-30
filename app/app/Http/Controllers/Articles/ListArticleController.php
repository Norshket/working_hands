<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\ListRequest;
use App\Service\Articles\ArticleServices;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListArticleController extends Controller
{
    public function __invoke(ListRequest $request, ArticleServices $services): JsonResponse
    {
        $data = $services->getIndexData($request->validated());

        return response()->json($data);
    }
}
