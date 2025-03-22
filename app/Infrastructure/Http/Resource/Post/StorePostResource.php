<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Resource\Post;

use App\Domain\Post\Entity\PostEntityInterface;

class StorePostResource
{
    public static function toArray(PostEntityInterface $post): array
    {
        return [
            'data' => [
                'post' => [
                    'id' => $post->getId(),
                    'title' => $post->getTitle(),
                    'slug' => $post->getSlug(),
                    'content' => $post->getContent(),
                    'score' => $post->getScore(),
                    'created_at' => $post->getCreatedAt()->toDateTimeString(),
                    'updated_at' => $post->getUpdatedAt()->toDateTimeString(),
                ],
            ],
        ];
    }
}
