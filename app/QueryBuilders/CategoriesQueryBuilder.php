<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Category;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Database\Eloquent\Builder;

final class CategoriesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}
