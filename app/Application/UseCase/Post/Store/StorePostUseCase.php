<?php

declare(strict_types=1);

namespace App\Application\UseCase\Post\Store;

use App\Domain\Post\Service\PostServiceInterface;
use App\Infrastructure\Persistence\Mysql\Repository\Post\Create\CreatePostDto;
use App\Infrastructure\Persistence\Mysql\Repository\Post\PostRepositoryInterface;

class StorePostUseCase
{
    public function __construct(
        private PostRepositoryInterface $postRepository,
        private PostServiceInterface $postService
    ) {
    }

    public function execute(StorePostInputDto $input): StorePostOutputDto
    {
        $postSlug = $this->postService->generateSlug($input->title);
        $createPostDto = new CreatePostDto(
            title: $input->title,
            slug: $postSlug,
            content: $input->content,
        );

        $createdPost = $this->postRepository->create($createPostDto);

        return new StorePostOutputDto(
            post: $createdPost
        );
    }
}
