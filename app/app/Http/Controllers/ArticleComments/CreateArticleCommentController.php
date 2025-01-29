<?php

namespace App\Http\Controllers\ArticleComments;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleComments\CreateRequest;
use App\Models\Article;
use App\Service\ArticleComments\ArticleCommentServices;

class CreateArticleCommentController extends Controller
{
    public function __invoke(Article $article, CreateRequest $request, ArticleCommentServices $services)
    {
        $data = $request->validated();
        $services->create($article, $data);

        return response()->json([
            'message' => 'success',
        ]);

    }
}
