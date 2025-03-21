<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Mysql\Repository\Post\Create;

class CreatePostDto
{
    public function __construct(
        public string $title,
        public string $slug,
        public string $content,
    ) {
    }
}
