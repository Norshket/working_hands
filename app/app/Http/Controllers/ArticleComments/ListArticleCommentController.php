<?php

namespace App\Http\Controllers\ArticleComments;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleComments\ListRequest;
use App\Http\Resources\ArticleComments\ListResource;
use App\Models\Article;
use App\Service\ArticleComments\ArticleCommentServices;

class ListArticleCommentController extends Controller
{
    public function __invoke(Article $article, ListRequest $request, ArticleCommentServices $services)
    {
        $data = $request->validated();
        [$comments, $pagination] = $services->getArticles($article, $data);
        return response()->json([ListResource::collection($comments), $pagination]);
    }
}
