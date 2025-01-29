<?php

namespace App\Http\Controllers\ArticleComments;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Http\Request;

class DeleteArticleCommentController extends Controller
{
    public function __invoke(ArticleComment $comment, Request $request)
    {

    }
}
