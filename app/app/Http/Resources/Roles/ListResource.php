<?php

namespace App\Http\Resources\Roles;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

/** @mixin Role */
class ListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'display_name' => $this->display_name,
        ];
    }
}
