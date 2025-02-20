<?php

namespace App\Http\Controllers\ArticleComments;

use App\Http\Controllers\Controller;
use App\Models\ArticleComment;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(ArticleComment $comment, Request $request)
    {
        $this->authorize('delete', $comment);
    }
}
