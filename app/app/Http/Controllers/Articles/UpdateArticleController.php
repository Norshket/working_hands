<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\UpdateRequest;
use App\Http\Resources\Articles\ShowResource;
use App\Models\Article;
use App\Service\Articles\ArticleServices;

class UpdateArticleController extends Controller
{
    public function __invoke(Article $article, UpdateRequest $request , ArticleServices $services)
    {
        $data =$request->validated();
        $response = $services->update($data);
        return new ShowResource($response);
    }
}
