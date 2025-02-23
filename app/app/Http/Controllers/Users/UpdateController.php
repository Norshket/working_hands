<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateRequest;
use App\Http\Resources\Users\ItemResource;
use App\Models\User;
use App\Service\Users\UserService;

class UpdateController extends Controller
{
    public function __invoke(User $user, UpdateRequest $request, UserService $service)
    {
        $this->authorize('update', $user);
        return ItemResource::make($service->update($user, $request->validated()));
    }
}
