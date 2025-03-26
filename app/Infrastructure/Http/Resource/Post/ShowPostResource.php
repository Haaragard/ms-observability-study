<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Resource\Post;

use App\Domain\Post\Entity\PostEntityInterface;

class ShowPostResource
{
    public static function toArray(PostEntityInterface $postEntity): array
    {
        return [
            'data' => [
                'post' => [
                    'id' => $postEntity->getId(),
                    'slug' => $postEntity->getSlug(),
                    'title' => $postEntity->getTitle(),
                    'content' => $postEntity->getContent(),
                    'created_at' => $postEntity->getCreatedAt()->toDateTimeString(),
                    'updated_at' => $postEntity->getUpdatedAt()->toDateTimeString(),
                ],
            ],
        ];
    }
}
