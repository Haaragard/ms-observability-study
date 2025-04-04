<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Mysql\Repository\Post;

use App\_Shared\Utils\Carbon;
use App\_Shared\Utils\Collection;
use App\Domain\Post\Entity\PostEntity;
use App\Domain\Post\Entity\PostEntityInterface;
use App\Infrastructure\Persistence\Model\Model;
use App\Infrastructure\Persistence\Model\Post;
use App\Infrastructure\Persistence\Mysql\Repository\BaseRepository;
use App\Infrastructure\Persistence\Mysql\Repository\Post\Create\CreatePostDto;
use App\Infrastructure\Persistence\Mysql\Repository\Post\Get\PaginateDto;

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

    public function paginate(PaginateDto $dto): Collection
    {
        $query = $this->model::query();
        $query->offset(($dto->page - 1) * $dto->perPage);
        $query->limit($dto->perPage);

        $results = $query->get();

        return new Collection(
            $results->map(
                static fn (Post $post): PostEntityInterface =>
                    new PostEntity(
                        id: $post->id,
                        createdAt: new Carbon($post->created_at),
                        updatedAt: new Carbon($post->updated_at),
                        title: $post->title,
                        slug: $post->slug,
                        content: $post->content,
                        score: $post->score ?? 0,
                    )
            )
        );
    }

    public function find(int $id): ?PostEntityInterface
    {
        $postModel = $this->model::find($id);
        if (is_null($postModel)) {
            return null;
        }

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
