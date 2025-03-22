<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller\Post;

use App\Infrastructure\Http\Controller\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Swoole\Http\Status;

class StoreGetController extends AbstractController
{
    public function __invoke(): ResponseInterface
    {
        return $this->response
            ->json([])
            ->withStatus(Status::OK);
    }
}
