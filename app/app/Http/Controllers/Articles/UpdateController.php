<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\UpdateRequest;
use App\Http\Resources\Articles\ItemResource;
use App\Models\Article;
use App\Service\Articles\ArticleService;

class UpdateController extends Controller
{
    public function __invoke(Article $article, UpdateRequest $request, ArticleService $service)
    {
        return ItemResource::make($service->update($article, $request->validated()));
    }
}
