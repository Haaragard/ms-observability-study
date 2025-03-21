<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Mysql\Repository\Post;

use App\Domain\Post\Entity\PostEntityInterface;
use App\Infrastructure\Persistence\Mysql\Repository\BaseRepositoryInterface;
use App\Infrastructure\Persistence\Mysql\Repository\Post\Create\CreatePostDto;

interface PostRepositoryInterface extends BaseRepositoryInterface
{
    public function create(CreatePostDto $dto): PostEntityInterface;
}
