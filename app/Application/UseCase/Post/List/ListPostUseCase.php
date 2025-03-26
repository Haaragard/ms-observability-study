<?php

declare(strict_types=1);

namespace App\Application\UseCase\Post\List;

use App\Infrastructure\Persistence\Mysql\Repository\Post\Get\PaginateDto;
use App\Infrastructure\Persistence\Mysql\Repository\Post\PostRepositoryInterface;

class ListPostUseCase
{
    public function __construct(
        private PostRepositoryInterface $postRepository
    ) {
    }

    public function execute(ListPostInputDto $input): ListPostOutputDto
    {
        $paginateDto = new PaginateDto(
            page: $input->page,
            perPage: $input->perPage
        );
        $entities = $this->postRepository->paginate($paginateDto);

        return new ListPostOutputDto($entities);
    }
}
