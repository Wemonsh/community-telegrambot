<?php

namespace App\Repositories;

use App\Repositories\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository implements EloquentRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getById(int $modelId, array $columns = [], array $relation = [], array $appends = []): Model
    {
        return $this->model->select($columns)->with($relation)->findOrFail($modelId)->append($appends);
    }
}
