<?php

declare(strict_types=1);

return [
    # Application

    # Domain
    ## Post
    App\Domain\Post\Service\PostServiceInterface::class => App\Domain\Post\Service\PostService::class,

    # Infrastructure
    ## Persistence
    ### Mysql
    App\Infrastructure\Persistence\Mysql\Repository\Post\PostRepositoryInterface::class => App\Infrastructure\Persistence\Mysql\Repository\Post\PostRepository::class,

    ## Cache
    App\Infrastructure\Cache\CacheInterface::class => App\Infrastructure\Cache\Cache::class,
];
