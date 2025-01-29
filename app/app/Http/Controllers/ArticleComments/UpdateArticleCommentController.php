<?php

namespace App\Http\Controllers\ArticleComments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\UpdateRequest;
use App\Http\Resources\Articles\ShowResource;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Service\Articles\ArticleServices;

class UpdateArticleCommentController extends Controller
{
    public function __invoke(ArticleComment $comment, UpdateRequest $request , ArticleServices $services)
    {
        $data =$request->validated();
        $response = $services->update($data);
        return new ShowResource($response);
    }
}
