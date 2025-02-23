<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Users\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreateController extends Controller
{
    public function __invoke(UserService $service): JsonResponse
    {
        $this->authorize('create', User::class);

        return response()->json($service->getCreateData());
    }
}
