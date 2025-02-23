<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Articles\ItemResource;
use App\Models\User;
use App\Service\Users\UserService;

class ShowController extends Controller
{
    public function __invoke(User $user, UserService $services)
    {
        $this->authorize('view', $user);
        return ItemResource::make($services->show($user));
    }
}
