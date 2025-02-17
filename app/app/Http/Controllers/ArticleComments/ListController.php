<?php

namespace App\Http\Controllers\ArticleComments;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleComments\ListRequest;
use App\Models\Article;
use App\Service\ArticleComments\ArticleCommentServices;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListController extends Controller
{
    public function __invoke(Article $article, ListRequest $request, ArticleCommentServices $services): JsonResponse
    {
        $response = $services->getListArticleComment($article, $request->validated());
        return response()->json($response);
    }
}
