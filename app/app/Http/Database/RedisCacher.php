<?php

namespace App\Http\Database;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class RedisCacher
{
    private string $key;
    private int $time;
    private Builder $builder;

    public function setParams(string $key, Builder $builder, int $time = 600): self
    {
        $this->key = $key;
        $this->time = $time;
        $this->builder = $builder;
        return $this;
    }

    public function cache(): Collection
    {
        return Cache::remember($this->key, $this->time, fn() => $this->builder->get());
    }

}
