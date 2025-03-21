<?php

declare(strict_types=1);

namespace App\Domain\_Shared\Entity;

use App\_Shared\Utils\Carbon;

interface BaseEntityInterface
{
    public function getId(): int;

    public function getCreatedAt(): Carbon;

    public function getUpdatedAt(): Carbon;
}
