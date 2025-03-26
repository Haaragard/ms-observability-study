<?php

declare(strict_types=1);

namespace App\Application\UseCase\Post\Show;

use App\Domain\Post\Entity\PostEntityInterface;

class ShowPostOutputDto
{
    public function __construct(
        public PostEntityInterface $postEntity
    ) {
    }
}
