<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Mysql\Repository\Post;

use App\_Shared\Utils\Carbon;
use App\Domain\Post\Entity\PostEntity;
use App\Domain\Post\Entity\PostEntityInterface;
use App\Infrastructure\Persistence\Model\Model;
use App\Infrastructure\Persistence\Model\Post;
use App\Infrastructure\Persistence\Mysql\Repository\BaseRepository;
use App\Infrastructure\Persistence\Mysql\Repository\Post\Create\CreatePostDto;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    protected Model|Post $model;

    public function __construct()
    {
        parent::__construct(Post::class);
    }

    public function create(CreatePostDto $dto): PostEntityInterface
    {
        $postModel = $this->model::create((array) $dto);

        return new PostEntity(
            id: $postModel->id,
            createdAt: new Carbon($postModel->created_at),
            updatedAt: new Carbon($postModel->updated_at),
            title: $postModel->title,
            slug: $postModel->slug,
            content: $postModel->content,
            score: $postModel->score ?? 0
        );
    }
}
