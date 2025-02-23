<?php

namespace App\Service\Articles;

use App\Http\Database\ListQueryBuilder;
use App\Http\Resources\Articles\ItemResource;
use App\Http\Resources\Articles\ListResource;
use App\Http\Resources\Tags\ListTagResource;
use App\Models\Article;
use App\Repositories\Articles\ArticleRepository;
use App\Repositories\Tags\TagRepository;
use App\Service\Cache\CacheService;
use App\Service\Cache\CacheTags;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ArticleService
{
    private ListQueryBuilder $listBuilder;
    private CacheService $cacheService;
    private ArticleRepository $articleRepository;
    private TagRepository $tagRepository;

    public function __construct(
        ListQueryBuilder $listBuilder,
        CacheService     $cacheService,
        ArticleRepository   $articleRepository,
        TagRepository    $tagRepository
    )
    {
        $this->listBuilder = $listBuilder;
        $this->cacheService = $cacheService;
        $this->articleRepository = $articleRepository;
        $this->tagRepository = $tagRepository;
    }

    public function getIndexData(array $params): array
    {
        $query = $this->articleRepository->listQuery($params);

        $this->listBuilder->setParams($query, $params);
        $query = $this->listBuilder->buildQuery();
        $pagination = $this->listBuilder->buildPagination();

        $key = implode('.', [CacheTags::ARTICLE_INDEX, json_encode($params)]);

        $articles = $this->cacheService
            ->setTags([CacheTags::ARTICLE_INDEX])
            ->cacheQueryResults($key, $query);

        return [
            'articles' => ListResource::collection($articles),
            'pagination' => $pagination
        ];
    }

    public function getCreateData(): array
    {
        $tags = $this->tagRepository->listQuery()->get();
        return [
            'tags' => ListTagResource::collection($tags)
        ];
    }

    public function getEditData(Article $article = null): array
    {
        return [
            'article' => ItemResource::make($article->load('tags')),
            'tags' => ListTagResource::collection($this->tagRepository->listQuery()->get())
        ];
    }

    public function show(Article $article): Article
    {
        return $article->load(['tags', 'media']);
    }

    public function store(array $data): Article
    {
        $article = auth()->user()->articles()->create($data);
        $article->tags()->sync($data['tags'] ?? []);
        $article->addMedia($data['image'])->preservingOriginal()->toMediaCollection('image');

        Cache::tags([CacheTags::ARTICLE_INDEX])->flush();

        return $article->load(['tags', 'media']);
    }

    public function update(Article $article, array $data): Article
    {
        $article = tap($article)->update($data);
        $article->tags()->sync($data['tags']);

        if (isset($data['image'])) {
            $article->clearMediaCollection('image');
            $article->addMedia($data['image'])->preservingOriginal()->toMediaCollection('image');
        }

        Cache::tags([CacheTags::ARTICLE_INDEX])->flush();

        return $article->load(['tags', 'media']);
    }

    public function delete(Article $article): bool
    {
        $isDeleted = DB::transaction(function () use ($article) {
            $article->comments()->delete();
            return $article->delete();
        });

        if ($isDeleted) {
            Cache::tags([CacheTags::ARTICLE_INDEX])->flush();
        }

        return $isDeleted;
    }
}
