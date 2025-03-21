<?php

declare(strict_types=1);

namespace App\Application\UseCase\Post\Store;

use App\Domain\Post\Entity\PostEntityInterface;

class StorePostOutputDto
{
    public function __construct(
        public PostEntityInterface $post
    ) {
    }
}
