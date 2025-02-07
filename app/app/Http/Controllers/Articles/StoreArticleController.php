<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\StoreRequest;
use App\Service\Articles\ArticleService;

class StoreArticleController extends Controller
{
    public function __invoke(StoreRequest $request, ArticleService $services)
    {
        $data = $request->validated();

        return $services->create($data);
    }
}
