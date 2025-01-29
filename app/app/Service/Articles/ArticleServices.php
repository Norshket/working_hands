<?php

namespace App\Service\Articles;

use App\Http\Database\ListQueryBuilder;
use App\Http\Database\RedisCacher;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleServices
{
    private ListQueryBuilder $listBuilder;
    private RedisCacher $cacher;

    public function __construct(ListQueryBuilder $listBuilder, RedisCacher $cacher)
    {
        $this->listBuilder = $listBuilder;
        $this->cacher = $cacher;
    }

    public function getArticles(array $params): array
    {
        $query = Article::query()->orderBy('id', 'desc');
        $this->listBuilder->setParams($query, $params);
        $pagination = $this->listBuilder->buildPagination();
        $cacheKey = 'articles.page.' . $pagination['currentPage'];

        $articles = $this->cacher->setParams($cacheKey, $this->listBuilder->buildQuery())->cache();

        return [$articles, $pagination];
    }

    public function show(Article $article): Article
    {
        return $article;
    }
}
