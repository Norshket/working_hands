<?php

namespace App\Http\Database;

use Illuminate\Contracts\Database\Query\Builder;

class ListQueryBuilder
{
    const PER_PAGE = 6;
    private Builder $query;
    private int $count;
    private ?int $limit;
    private ?int $offset;

    public function setParams(Builder $query, array $params): void
    {
        $this->query = $query;
        $this->count = $query->count();
        $this->limit = data_get($params, 'limit', static::PER_PAGE);
        $this->offset = data_get($params, 'offset');
    }


    public function buildQuery(): Builder
    {
        if ($this->offset) {
            $this->query->offset($this->offset);
        }

        $this->query->limit($this->limit);

        return $this->query;
    }


    public function buildPagination(): array
    {
        return [
            'total' => $this->count,
            'limit' => $this->limit,
            'lastPage' => round($this->count / $this->limit),
            'currentPage' => $this->offset / $this->limit + 1
        ];

    }
}
