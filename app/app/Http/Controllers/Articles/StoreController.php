<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\StoreRequest;
use App\Http\Resources\Articles\ItemResource;
use App\Service\Articles\ArticleService;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, ArticleService $services)
    {
        return ItemResource::make($services->store($request->validated()));
    }
}
