<?php

namespace App\Service\Cache;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CacheService
{

    private ?string $key = null;
    private array $tags = [];
    private int $time = 600;

    public function setTime(int $time = 600): void
    {
        $this->time = $time;
    }

    public function setTags(array $tags = []): self
    {
        $this->tags = $tags;
        return $this;
    }

    public function cacheQueryResults(string $key, Builder $builder): Collection
    {
        if (empty($this->tags)) {
            Cache::remember($this->key, $this->time, fn() => $builder->get());
        }

        return Cache::tags($this->tags)->remember($key, $this->time, fn() => $builder->get());
    }
}
