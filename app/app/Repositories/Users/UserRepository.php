<?php

namespace App\Repositories\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository
{
    public function listQuery(array $params = []): Builder
    {
        $query = User::query()->orderBy('id', 'desc');

        if (isset($params['roles'])) {
            $query->whereHas('roles', fn($query) => $query->whereIn('roles.id', $params['roles']));
        }

        return $query;
    }
}
