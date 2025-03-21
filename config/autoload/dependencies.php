<?php

declare(strict_types=1);

use App\Domain\Post\Service\PostService;
use App\Domain\Post\Service\PostServiceInterface;
use App\Infrastructure\Persistence\Mysql\Repository\Post\PostRepository;
use App\Infrastructure\Persistence\Mysql\Repository\Post\PostRepositoryInterface;

return [
    // Application

    // Domain
    # Post
    PostServiceInterface::class => PostService::class,

    // Infrastructure
    PostRepositoryInterface::class => PostRepository::class,
];
