<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Resources\Users\ItemResource;
use App\Models\User;
use App\Service\Users\UserService;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, UserService $services)
    {
        $this->authorize('create', User::class);


        return ItemResource::make($services->store($request->validated()));
    }
}
