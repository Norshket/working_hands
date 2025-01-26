<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Resources\Articles\IndexResource;
use App\Service\Articles\ArticleServices;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListArticleController extends Controller
{
    public function __invoke(Request $request, ArticleServices $services): JsonResource
    {
        return IndexResource::collection($services->getArticles([]));
    }
}
