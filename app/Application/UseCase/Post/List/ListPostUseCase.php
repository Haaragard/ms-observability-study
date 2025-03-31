<?php

declare(strict_types=1);

namespace App\Application\UseCase\Post\List;

use App\_Shared\Utils\Collection;
use App\Domain\Post\Entity\PostEntityInterface;
use App\Infrastructure\Cache\CacheInterface;
use App\Infrastructure\Persistence\Mysql\Repository\Post\Get\PaginateDto;
use App\Infrastructure\Persistence\Mysql\Repository\Post\PostRepositoryInterface;
use function Hyperf\Config\config;

class ListPostUseCase
{
    public function __construct(
        private PostRepositoryInterface $postRepository,
        private CacheInterface $cache
    ) {
    }

    public function execute(ListPostInputDto $input): ListPostOutputDto
    {
        $posts = $this->getFromCache(
            page: $input->page,
            perPage: $input->perPage
        );

        return new ListPostOutputDto($posts);
    }

    private function getCacheKey(int $page, int $perPage): string
    {
        return sprintf(
            config('cache.keys.post.list'),
            $page,
            $perPage
        );
    }

    /**
     * @return Collection<PostEntityInterface>
     */
    private function getPosts(int $page, int $perPage): Collection
    {
        $paginateDto = new PaginateDto(
            page: $page,
            perPage: $perPage
        );

        return $this->postRepository->paginate($paginateDto);
    }

    private function getFromCache(int $page, int $perPage): Collection
    {
        $cacheKey = $this->getCacheKey(
            page: $page,
            perPage: $perPage
        );

        $postsFromCache = $this->cache->get(
            $cacheKey,
            fn (): array => $this->getPosts($page, $perPage)->toArray()
        );

        if ($postsFromCache instanceof \Closure) {
            $postsFromCache = $postsFromCache();
        }

        return new Collection($postsFromCache);
    }
}
