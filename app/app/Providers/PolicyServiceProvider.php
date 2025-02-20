<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\ArticleComment;
use App\Policies\ArticleCommentPolicy;
use App\Policies\ArticlePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PolicyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::policy(Article::class, ArticlePolicy::class);
        Gate::policy(ArticleComment::class, ArticleCommentPolicy::class);
    }
}
