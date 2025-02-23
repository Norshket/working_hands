<?php

namespace App\Policies;

use App\Helpers\PermissionHelper;
use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionHelper::USERS_READ);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $item): bool
    {
        return $user->can(PermissionHelper::USERS_SHOW) || $user->isEqual($item);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can(PermissionHelper::USERS_CREATE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $item): bool
    {

        return $user->can(PermissionHelper::USERS_UPDATE) || $user->isEqual($item);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $item): bool
    {
        return $user->can(PermissionHelper::USERS_UPDATE) || $user->isEqual($item);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function block(User $user, User $item): bool
    {
        return $user->can(PermissionHelper::USERS_BLOCK);
    }
}
