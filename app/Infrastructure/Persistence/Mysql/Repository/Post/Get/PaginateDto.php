<?php

namespace App\Infrastructure\Persistence\Mysql\Repository\Post\Get;

class PaginateDto
{
    public function __construct(
        public int $page = 1,
        public int $perPage = 10,
    ) {
    }
}
