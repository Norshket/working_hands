<?php

namespace App\Http\Database;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class RedisCacher
{
    private string $key;
    private array $tags;
    private int $time = 600;

    public function setParams(string $key, array $tags, int $time = 600): void
    {
        $this->key = $key;
        $this->tags = $tags;
        $this->time = $time;
    }

    public function cache(Builder $builder): Collection
    {
        return Cache::tags($this->tags)->remember($this->key, $this->time, fn() => $builder->get());
    }
}
