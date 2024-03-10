<?php

declare(strict_types=1);

namespace App\QueryBuilders;


use App\Models\AnotherPost;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class AnotherPostsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = AnotherPost::query();
    }

    public function getAll(): Collection
    {
        return AnotherPost::all();
    }
}
