<?php

namespace App\Service\Articles;

use App\Http\Database\ListQueryBuilder;
use App\Http\Resources\Articles\ListResource;
use App\Http\Resources\Articles\ShowResource;
use App\Http\Resources\Articles\UpdateResource;
use App\Http\Resources\Tags\ListTagResource;
use App\Models\Article;
use App\Repositories\Articles\ArticleRepository;
use App\Repositories\Tags\TagRepository;
use App\Service\Cache\CacheService;
use App\Service\Cache\CacheTags;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

class ArticleService
{
    private ListQueryBuilder $listBuilder;
    private CacheService $cacheService;
    private ArticleRepository $articleRepository;
    private TagRepository $tagRepository;

    public function __construct(
        ListQueryBuilder  $listBuilder,
        CacheService      $cacheService,
        ArticleRepository $articleRepository,
        TagRepository     $tagRepository
    )
    {
        $this->listBuilder = $listBuilder;
        $this->cacheService = $cacheService;
        $this->articleRepository = $articleRepository;
        $this->tagRepository = $tagRepository;
    }

    public function getIndexData(array $params): array
    {
        $query = $this->articleRepository->articlesQuery($params);

        $this->listBuilder->setParams($query, $params);
        $query = $this->listBuilder->buildQuery();
        $pagination = $this->listBuilder->buildPagination();

        $key = implode('.', [CacheTags::ARTICLE_INDEX, ...$params]);

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
        $tags = $this->tagRepository->tagQuery()->get();
        return [
            'tags' => ListTagResource::collection($tags)
        ];
    }

    public function getEditData(Article $article = null): array
    {
        $tags = $this->tagRepository->tagQuery()->get();

        return [
            'article' => isset($article) ? UpdateResource::make($article->load('tags')) : null,
            'tags' => ListTagResource::collection($tags)
        ];
    }

    public function show(Article $article): Article
    {
        return $article->load('tags');
    }

    public function create(array $data): JsonResource
    {
        $article = auth()->user()->articles()->create($data);
        $article->tags()->sync($data['tags']);
        $article->addMedia($data['image'])->preservingOriginal()->toMediaCollection('image');

        Cache::tags([CacheTags::ARTICLE_INDEX])->flush();

        return ShowResource::make($article->load(['tags', 'media']));
    }

    public function update(Article $article, array $data): JsonResource
    {
        $article = tap($article)->update($data);
        $article->tags()->sync($data['tags']);

        if (isset($data['image'])) {
            $article->clearMediaCollection('image');
            $article->addMedia($data['image'])->preservingOriginal()->toMediaCollection('image');
        }

        Cache::tags([CacheTags::ARTICLE_INDEX])->flush();


        return ShowResource::make($article->load('tags'));
    }
}
