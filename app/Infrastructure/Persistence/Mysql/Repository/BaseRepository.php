<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Mysql\Repository;

use App\Infrastructure\Persistence\Model\Model;

class BaseRepository
{
    protected Model $model;

    public function __construct(string $modelClass)
    {
        $this->model = new $modelClass();
    }
}
