<?php

namespace App\Http\Resources\Users;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/** @mixin User */
class ListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'roles' => collect($this->whenLoaded('roles'))->pluck('name'),
            'permissions' => $this->whenLoaded('permissions')
                ? $this->getAllPermissions()->pluck('name')
                : null,
        ];
    }
}
