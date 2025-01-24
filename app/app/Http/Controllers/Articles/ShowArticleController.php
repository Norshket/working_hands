<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ShowArticleController extends Controller
{
    public function __invoke(Article $article, Request $request)
    {
        return response()->json([
                'response' => 'asdasdas'
            ]
        );
    }
}
