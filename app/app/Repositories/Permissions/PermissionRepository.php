<?php

namespace App\Repositories\Permissions;

use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Permission;

class PermissionRepository
{
    public function listQuery(): Builder
    {
        return Permission::query()->orderBy('id', 'desc');
    }
}
