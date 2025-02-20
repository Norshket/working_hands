<?php

namespace App\Http\Controllers\ArticleComments;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleComments\CreateRequest;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Service\ArticleComments\ArticleCommentServices;

class CreateController extends Controller
{
    public function __invoke(Article $article, CreateRequest $request, ArticleCommentServices $services)
    {

        $this->authorize('create', ArticleComment::class);

        $services->create($article, $request->validated());

        return response()->json(['message' => 'success']);
    }
}
