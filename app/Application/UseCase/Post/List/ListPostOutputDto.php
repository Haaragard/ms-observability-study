<?php

namespace App\Application\UseCase\Post\List;

use App\_Shared\Utils\Collection;
use App\Domain\Post\Entity\PostEntityInterface;

class ListPostOutputDto
{
    public function __construct(
        public Collection $posts
    ) {
    }
}
