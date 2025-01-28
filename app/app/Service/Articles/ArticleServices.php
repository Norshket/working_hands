<?php

namespace App\Service\Articles;

use App\Http\Database\ListQueryBuilder;
use App\Models\Article;

class ArticleServices
{
    private ListQueryBuilder $listBuilder;

    public function __construct(ListQueryBuilder $listBuilder)
    {
        $this->listBuilder = $listBuilder;
    }

    public function getArticles(array $params): array
    {
        $query = Article::query()->orderBy('id', 'desc');

        $this->listBuilder->setParams($query, $params);
        $articles = $this->listBuilder->buildQuery()->get();
        $pagination = $this->listBuilder->buildPagination();

        return [$articles,$pagination];
    }

    public function show(Article $article): Article
    {
        return $article;
    }
}
