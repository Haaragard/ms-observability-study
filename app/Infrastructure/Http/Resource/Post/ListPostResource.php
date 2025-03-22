<?php

namespace App\Infrastructure\Http\Resource\Post;

use App\_Shared\Utils\Collection;
use App\Domain\Post\Entity\PostEntityInterface;

class ListPostResource
{
    /**
     * @param Collection<PostEntityInterface> $posts
     * @return array<string, mixed>
     */
    public static function toArray(Collection $posts): array
    {
        return [
            'data' => $posts->map(
                fn (PostEntityInterface $post): array =>
                    [
                        'id' => $post->getId(),
                        'title' => $post->getTitle(),
                        'slug' => $post->getSlug(),
                        'content' => $post->getContent(),
                        'score' => $post->getScore(),
                        'created_at' => $post->getCreatedAt()->toDateTimeString(),
                        'updated_at' => $post->getUpdatedAt()->toDateTimeString(),
                    ]
            )
        ];
    }
}
