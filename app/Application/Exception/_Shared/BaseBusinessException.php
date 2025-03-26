<?php

declare(strict_types=1);

namespace App\Application\Exception\_Shared;

use App\_Shared\Utils\HttpStatus;
use Exception;
use Throwable;

class BaseBusinessException extends Exception
{
    private const int DEFAULT_CODE = HttpStatus::BAD_REQUEST;

    public function __construct(
        string $message = '',
        int $code = self::DEFAULT_CODE,
        ?Throwable $previous = null
    ) {
        parent::__construct(
            message: $message,
            code: $code,
            previous: $previous
        );
    }
}
