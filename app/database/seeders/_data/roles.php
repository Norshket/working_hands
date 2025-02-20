<?php

use App\Helpers\RoleHelper;
use \App\Helpers\PermissionHelper;

return [
    RoleHelper::ADMIN => [
        PermissionHelper::ARTICLES_READ,
        PermissionHelper::ARTICLES_SHOW,
        PermissionHelper::ARTICLES_CREATE,
        PermissionHelper::ARTICLES_UPDATE,
        PermissionHelper::ARTICLES_DELETE,

        PermissionHelper::USERS_READ,
        PermissionHelper::USERS_SHOW,
        PermissionHelper::USERS_CREATE,
        PermissionHelper::USERS_UPDATE,
        PermissionHelper::USERS_DELETE,
        PermissionHelper::USERS_BLOCK,

    ],

    RoleHelper::MODERATOR => [
        PermissionHelper::ARTICLES_READ,
        PermissionHelper::ARTICLES_SHOW,
        PermissionHelper::ARTICLES_UPDATE,
        PermissionHelper::ARTICLES_DELETE,

        PermissionHelper::USERS_BLOCK,
    ],

    RoleHelper::USER => [
        PermissionHelper::ARTICLES_READ,
        PermissionHelper::ARTICLES_SHOW,
        PermissionHelper::ARTICLES_CREATE,
        PermissionHelper::ARTICLES_UPDATE,
        PermissionHelper::ARTICLES_DELETE,
    ],
];
