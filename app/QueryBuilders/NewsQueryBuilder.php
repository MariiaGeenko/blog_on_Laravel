<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\News;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Summary of NewsQueryBuilder
 */
final class NewsQueryBuilder extends QueryBuilder
{
    /**
     * Summary of model
     * @var Builder
     */
    public Builder $model;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->model = News::query();
    }

    /**
     * Summary of getNewsByStatus
     * @param string $status
     * @return Collection
     */
    public function getNewsByStatus(string $status): Collection
    {
         return News::query()->get(); //where('status', $status)->
    }

    function getAll(): Collection
    {
        return News::query()->get();
    }
}
