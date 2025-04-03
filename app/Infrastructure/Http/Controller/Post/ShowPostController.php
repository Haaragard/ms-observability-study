<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller\Post;

use App\Application\Exception\_Shared\BaseBusinessException;
use App\Application\UseCase\Post\Show\ShowPostInputDto;
use App\Application\UseCase\Post\Show\ShowPostUseCase;
use App\Infrastructure\Http\Resource\Post\ShowPostResource;
use Hyperf\HttpServer\Contract\ResponseInterface as HyperfResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;
use Swoole\Http\Status;
use Throwable;

class ShowPostController
{
    public function __construct(
        private ShowPostUseCase $showPostUseCase,
        private HyperfResponseInterface $response
    ) {
    }

    public function __invoke(int $id): PsrResponseInterface
    {
        try {
            $showPostInputDto = new ShowPostInputDto(id: $id);

            $output = $this->showPostUseCase->execute($showPostInputDto);

            return $this->response
                ->json(ShowPostResource::toArray($output->postEntity))
                ->withStatus(Status::OK);
        } catch (BaseBusinessException $exception) {
            return $this->response
                ->json(['message' => $exception->getMessage()])
                ->withStatus($exception->getCode());
        } catch (Throwable $exception) {
            return $this->response
                ->json(['message' => $exception->getMessage()])
                ->withStatus(Status::INTERNAL_SERVER_ERROR);
        }
    }
}
