<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\News;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function getNewsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate($quantity);
    }

    function getAll(): Collection
    {
        return News::query()->get();
    }

    public function getNewsById(int $id): Collection
    {
        return News::orderBy($id)->get();

        //return News::find($id);
    }
}
