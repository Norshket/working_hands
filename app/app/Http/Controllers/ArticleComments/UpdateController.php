<?php

namespace App\Http\Controllers\ArticleComments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\UpdateRequest;
use App\Models\ArticleComment;
use App\Service\ArticleComments\ArticleCommentServices;

class UpdateController extends Controller
{
    public function __invoke(ArticleComment $comment, UpdateRequest $request, ArticleCommentServices $services)
    {
        $this->authorize('update', $comment);

        $services->update($comment, $request->validated());

        return response()->json(['message' => 'success']);
    }
}
