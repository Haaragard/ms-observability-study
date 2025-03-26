<?php

declare(strict_types=1);

namespace App\Application\Exception\_Shared;

use App\_Shared\Utils\HttpStatus;
use Throwable;

class EntityNotFoundException extends BaseBusinessException
{
    public function __construct(
        string $message = '',
        ?Throwable $previous = null
    ) {
        parent::__construct(
            message: $message,
            code: HttpStatus::NOT_FOUND,
            previous: $previous
        );
    }
}
