<?php

declare(strict_types=1);

namespace App\Domain\_Shared\Entity;

use App\_Shared\Utils\Carbon;

abstract class BaseEntity implements BaseEntityInterface
{
    protected int $id;

    protected Carbon $createdAt;

    protected Carbon $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }
}
