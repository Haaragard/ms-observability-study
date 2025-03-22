<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller\Post;

use App\Application\UseCase\Post\Store\StorePostInputDto;
use App\Application\UseCase\Post\Store\StorePostUseCase;
use App\Infrastructure\Http\Controller\AbstractController;
use App\Infrastructure\Http\Request\Post\StorePostRequest;
use App\Infrastructure\Http\Resource\Post\StorePostResource;
use Hyperf\Validation\ValidationException;
use Psr\Http\Message\ResponseInterface;
use Swoole\Http\Status;
use Throwable;

class StorePostController extends AbstractController
{
    public function __construct(
        private StorePostUseCase $storePostUseCase
    ) {
    }

    public function __invoke(StorePostRequest $request): ResponseInterface
    {
        try {
            $storePostInputDto = new StorePostInputDto(
                title: $request->input('title'),
                content: $request->input('content'),
            );

            $output = $this->storePostUseCase->execute($storePostInputDto);

            return $this->response
                ->json(StorePostResource::toArray($output->post))
                ->withStatus(Status::CREATED);
        } catch (Throwable $exception) {
            return $this->response
                ->json(['message' => $exception->getMessage()])
                ->withStatus(Status::INTERNAL_SERVER_ERROR);
        }
    }
}
