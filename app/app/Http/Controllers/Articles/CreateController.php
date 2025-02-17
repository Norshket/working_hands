<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Service\Articles\ArticleService;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreateController extends Controller
{
    public function __invoke(ArticleService $service): JsonResponse
    {
        return response()->json($service->getCreateData());
    }
}
