<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\ListRequest;
use App\Models\User;
use App\Service\Users\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListController extends Controller
{
    public function __invoke(ListRequest $request, UserService $services): JsonResponse
    {
        $this->authorize('view-any', User::class);

        return response()->json($services->getIndexData($request->validated()));
    }
}
