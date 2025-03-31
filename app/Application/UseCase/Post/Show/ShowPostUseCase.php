<?php

declare(strict_types=1);

namespace App\Application\UseCase\Post\Show;

use App\Application\Exception\_Shared\EntityNotFoundException;
use App\Domain\Post\Entity\PostEntityInterface;
use App\Infrastructure\Cache\CacheInterface;
use App\Infrastructure\Persistence\Mysql\Repository\Post\PostRepositoryInterface;
use function Hyperf\Config\config;

class ShowPostUseCase
{
    public function __construct(
        private PostRepositoryInterface $postRepository,
        private CacheInterface $cache
    ) {
    }

    /**
     * @throws EntityNotFoundException
     */
    public function execute(ShowPostInputDto $input): ShowPostOutputDto
    {
        $postEntity = $this->getPost($input->id);
        if (is_null($postEntity)) {
            throw new EntityNotFoundException('Post not found');
        }

        return new ShowPostOutputDto(postEntity: $postEntity);
    }

    private function getCacheKey(int $id): string
    {
        return sprintf(
            config('cache.keys.post.show'),
            $id
        );
    }

    private function getPost(int $id): ?PostEntityInterface
    {
        $cacheKey = $this->getCacheKey($id);

        $postFromCache = $this->cache->get(
            $cacheKey,
            fn (): ?PostEntityInterface => $this->postRepository->find($id)
        );

        if ($postFromCache instanceof \Closure) {
            $postFromCache = $postFromCache();
        }

        return $postFromCache;
    }
}
