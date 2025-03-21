<?php

namespace App\Domain\Post\Service;

interface PostServiceInterface
{
    public function generateSlug(string $title): string;
}
