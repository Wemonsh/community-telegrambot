<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    public function getById(int $modelId, array $columns = [], array $relation = [], array $appends = []): Model;
}
