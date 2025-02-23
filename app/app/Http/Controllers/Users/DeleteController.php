<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use App\Service\Users\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;

class DeleteController extends Controller
{
    public function __invoke(User $user, UserService $service): JsonResponse
    {
        $this->authorize('delete', $user);

        return response()->json($service->delete($user));
    }
}
