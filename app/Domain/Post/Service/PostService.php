<?php

namespace App\Domain\Post\Service;

use App\_Shared\Utils\Str;

class PostService implements PostServiceInterface
{
    public function generateSlug(string $title): string
    {
        return Str::slug($title);
    }
}
