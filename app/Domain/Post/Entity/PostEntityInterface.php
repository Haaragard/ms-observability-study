<?php

declare(strict_types=1);

namespace App\Domain\Post\Entity;

use App\Domain\_Shared\Entity\BaseEntityInterface;

interface PostEntityInterface extends BaseEntityInterface
{
    public function getTitle(): string;

    public function getSlug(): string;

    public function getContent(): string;

    public function getScore(): int;
}
