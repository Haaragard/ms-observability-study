<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Container\ContainerInterface;

abstract class AbstractController
{
    public function __construct(
        protected ContainerInterface $container,
        protected ResponseInterface $response
    ) {
    }
}
