<?php

namespace App\Policies;

use App\Helpers\PermissionHelper;
use App\Helpers\RoleHelper;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\User;

class ArticleCommentPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isBlocked() && $user->can(PermissionHelper::ARTICLE_COMMENTS_CREATE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ArticleComment $comment): bool
    {
        if ($user->isBlocked()) {
            return false;
        }

        if ($user->can(PermissionHelper::ARTICLE_COMMENTS_UPDATE && $comment->hasAuthor($user))) {
            return true;
        }
        return $user->hasRole(RoleHelper::ADMIN) || $user->hasRole(RoleHelper::MODERATOR);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user,  ArticleComment $comment): bool
    {
        if ($user->can(PermissionHelper::ARTICLE_COMMENTS_DELETE && $comment->hasAuthor($user))) {
            return true;
        }
        return $user->hasExactRoles(RoleHelper::ADMIN) || $user->hasRole(RoleHelper::MODERATOR);
    }
}
