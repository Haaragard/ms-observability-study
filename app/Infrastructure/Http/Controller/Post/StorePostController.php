<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller\Post;

use App\_Shared\Utils\HttpStatus;
use App\Application\UseCase\Post\Store\StorePostInputDto;
use App\Application\UseCase\Post\Store\StorePostUseCase;
use App\Infrastructure\Http\Request\Post\StorePostRequest;
use App\Infrastructure\Http\Resource\Post\StorePostResource;
use Hyperf\HttpServer\Contract\ResponseInterface as HyperfResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;
use Throwable;

class StorePostController
{
    public function __construct(
        private StorePostUseCase $storePostUseCase,
        private HyperfResponseInterface $response
    ) {
    }

    public function __invoke(StorePostRequest $request): PsrResponseInterface
    {
        try {
            $storePostInputDto = new StorePostInputDto(
                title: $request->input('title'),
                content: $request->input('content'),
            );

            $output = $this->storePostUseCase->execute($storePostInputDto);

            return $this->response
                ->json(StorePostResource::toArray($output->post))
                ->withStatus(HttpStatus::CREATED);
        } catch (Throwable $exception) {
            return $this->response
                ->json(['message' => $exception->getMessage()])
                ->withStatus(HttpStatus::INTERNAL_SERVER_ERROR);
        }
    }
}
