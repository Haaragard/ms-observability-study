<?php

declare(strict_types=1);

namespace App\Application\UseCase\Post\Show;

use App\Application\Exception\_Shared\EntityNotFoundException;
use App\Infrastructure\Persistence\Mysql\Repository\Post\PostRepositoryInterface;

class ShowPostUseCase
{
    public function __construct(
        private PostRepositoryInterface $postRepository
    ) {
    }

    /**
     * @throws EntityNotFoundException
     */
    public function execute(ShowPostInputDto $input): ShowPostOutputDto
    {
        $postEntity = $this->postRepository->find($input->id);
        if (is_null($postEntity)) {
            throw new EntityNotFoundException('Post not found');
        }

        return new ShowPostOutputDto(postEntity: $postEntity);
    }
}
