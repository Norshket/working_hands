<?php

namespace App\Service\Articles;

use App\Models\Article;
use Illuminate\Support\Collection;

class ArticleServices
{
    public function getArticles(array $filters): Collection
    {
        return Article::query()->get();
    }

    public function show()
    {

    }
}
