<?php

namespace App\Repositories\Roles;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role;

class RoleRepository
{
    public function listQuery(): Builder
    {
        return Role::query()->orderBy('id', 'desc');
    }
}
