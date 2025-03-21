<?php

declare(strict_types=1);

namespace App\Domain\Post\Entity;

use App\_Shared\Utils\Carbon;
use App\Domain\_Shared\Entity\BaseEntity;

class PostEntity extends BaseEntity implements PostEntityInterface
{
    public function __construct(
        protected int $id,
        protected Carbon $createdAt,
        protected Carbon $updatedAt,
        private string $title,
        private string $slug,
        private string $content,
        private int $score,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getScore(): int
    {
        return $this->score;
    }
}
