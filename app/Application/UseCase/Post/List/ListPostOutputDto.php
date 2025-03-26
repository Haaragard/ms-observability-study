<?php

declare(strict_types=1);

namespace App\Application\UseCase\Post\List;

use App\_Shared\Utils\Collection;

class ListPostOutputDto
{
    public function __construct(
        public Collection $posts
    ) {
    }
}
