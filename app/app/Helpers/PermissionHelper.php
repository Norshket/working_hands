<?php

namespace App\Helpers;

class PermissionHelper
{
    const ARTICLES_READ = 'articles_read';
    const ARTICLES_SHOW = 'articles_show';
    const ARTICLES_CREATE = 'articles_create';
    const ARTICLES_UPDATE = 'articles_update';
    const ARTICLES_DELETE = 'articles_delete';
//    -----------------------------------------------------------------    const ARTICLES_READ = 'articles_read';
    const ARTICLE_COMMENTS_CREATE = 'article_comments_create';
    const ARTICLE_COMMENTS_UPDATE = 'article_comments_update';
    const ARTICLE_COMMENTS_DELETE = 'article_commentsdelete';
//    -----------------------------------------------------------------
    const USERS_READ = 'users_read';
    const USERS_SHOW = 'users_show';
    const USERS_CREATE = 'users_create';
    const USERS_UPDATE = 'users_update';
    const USERS_DELETE = 'users_delete';
    const USERS_BLOCK = 'users_block';
//    -----------------------------------------------------------------
    const TAG_READ = 'tag_read';
    const TAG_SHOW = 'tag_show';
    const TAG_CREATE = 'tag_create';
    const TAG_UPDATE = 'tag_update';
    const TAG_DELETE = 'tag_delete';
//    -----------------------------------------------------------------
}
