<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Users\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;

class EditController extends Controller
{
    public function __invoke(User $user, UserService $service): JsonResponse
    {
        $this->authorize('update', $user);

        return response()->json($service->getEditData($user));
    }
}
