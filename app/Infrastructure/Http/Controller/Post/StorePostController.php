<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller\Post;

use App\Application\UseCase\Post\Store\StorePostInputDto;
use App\Application\UseCase\Post\Store\StorePostUseCase;
use App\Infrastructure\Http\Controller\AbstractController;
use App\Infrastructure\Http\Request\Post\StorePostRequest;
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
                ->json(['data' => [
                    'post' => [
                        'id' => $output->post->getId(),
                        'title' => $output->post->getTitle(),
                        'slug' => $output->post->getSlug(),
                        'content' => $output->post->getContent(),
                        'score' => $output->post->getScore(),
                        'created_at' => $output->post->getCreatedAt()->toDateTimeString(),
                        'updated_at' => $output->post->getUpdatedAt()->toDateTimeString(),
                    ]
                ]])
                ->withStatus(Status::CREATED);

        } catch (ValidationException $exception) {
            return $this->response
                ->json(['message' => $exception->getMessage()])
                ->withStatus(Status::UNPROCESSABLE_ENTITY);
        } catch (Throwable $exception) {
            return $this->response
                ->json(['message' => $exception->getMessage()])
                ->withStatus(Status::INTERNAL_SERVER_ERROR);
        }
    }
}
