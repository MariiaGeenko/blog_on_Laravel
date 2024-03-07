<?php

declare(strict_types=1);

namespace App\QueryBuilders;


use App\Models\Main_news;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class Main_newsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Main_news::query();
    }

    public function getAll(): Collection
    {
        return Main_news::all();
    }
}
