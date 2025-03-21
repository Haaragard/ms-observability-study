<?php

declare(strict_types=1);

namespace App\Application\UseCase\Post\Store;

class StorePostInputDto
{
    public function __construct(
        public string $title,
        public string $content,
    ) {
    }
}
