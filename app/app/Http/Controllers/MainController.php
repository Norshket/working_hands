<?php

namespace App\Http\Controllers;

use App\Http\Resources\Articles\IndexResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MainController extends Controller
{
    public function __invoke(Request $request): JsonResource
    {
        $lastArticle = Article::query()->lasted()->get();

        return IndexResource::collection($lastArticle);
    }
}
