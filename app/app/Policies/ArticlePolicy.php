<?php

namespace App\Policies;

use App\Helpers\PermissionHelper;
use App\Helpers\RoleHelper;
use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionHelper::ARTICLES_READ);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Article $article): bool
    {
        return $user->can(PermissionHelper::ARTICLES_SHOW);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can(PermissionHelper::ARTICLES_CREATE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Article $article): bool
    {
        if ($user->can(PermissionHelper::ARTICLES_UPDATE && $article->hasAuthor($user))) {
            return true;
        }
        return $user->hasRole(RoleHelper::ADMIN) || $user->hasRole(RoleHelper::MODERATOR);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Article $article): bool
    {
        if ($user->can(PermissionHelper::ARTICLES_DELETE && $article->hasAuthor($user))) {
            return true;
        }
        return $user->hasExactRoles(RoleHelper::ADMIN) || $user->hasRole(RoleHelper::MODERATOR);
    }
}
