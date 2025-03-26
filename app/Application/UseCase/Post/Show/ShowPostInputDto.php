<?php

declare(strict_types=1);

namespace App\Application\UseCase\Post\Show;

class ShowPostInputDto
{
    public function __construct(
        public int $id
    ) {
    }
}
