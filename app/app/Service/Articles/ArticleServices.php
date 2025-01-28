<?php

namespace App\Service\Articles;

use App\Models\Article;

class ArticleServices
{
    const PER_PAGE = 6;

    public function getArticles(array $params): array
    {
        $limit = data_get($params, 'limit', static::PER_PAGE);
        $offset = data_get($params, 'offset');

        $query = Article::query()->orderBy('id', 'desc');

        $count = $query->count();

        if ($offset) {
            $query->offset($offset);
        }

        $article = $query->limit($limit)->get();


        return [
            'data' => $article,
            'meta' => [
                'total' => $count,
                'limit' => $limit,
                'lastPage' => round($count / $limit)
            ],
        ];
    }

    public function show(Article $article): Article
    {
        return $article;
    }
}
