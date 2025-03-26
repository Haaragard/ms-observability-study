<?php

declare(strict_types=1);

namespace App\Application\UseCase\Post\List;

class ListPostInputDto
{
    public function __construct(
        public int $page = 1,
        public int $perPage = 10,
    ) {
    }
}
