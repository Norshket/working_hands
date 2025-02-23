<?php

namespace App\Http\Resources\Users;

use App\Http\Resources\Permissions\ListResource as PermissionResource;
use App\Http\Resources\Roles\ListResource as RoleResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin User */
class ItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'roles' => $this->whenLoaded(
                'roles',
                fn() => RoleResource::collection($this->roles)
            ),
            'permissions' => $this->whenLoaded(
                'permissions',
                fn() => PermissionResource::collection($this->permissions)
            ),
        ];
    }
}
