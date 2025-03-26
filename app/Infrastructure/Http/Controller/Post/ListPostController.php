<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller\Post;

use App\_Shared\Utils\HttpStatus;
use App\Application\UseCase\Post\List\ListPostInputDto;
use App\Application\UseCase\Post\List\ListPostUseCase;
use App\Infrastructure\Http\Controller\AbstractController;
use App\Infrastructure\Http\Request\Post\ListPostRequest;
use App\Infrastructure\Http\Resource\Post\ListPostResource;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class ListPostController extends AbstractController
{
    public function __construct(
        private ListPostUseCase $listPostUseCase
    ) {
    }

    public function __invoke(ListPostRequest $request): ResponseInterface
    {
        try {
            $input = new ListPostInputDto(
                page: (int)$request->input('page', 1) ?: 1,
                perPage: (int)$request->input('per_page', 10) ?: 10
            );
            $output = $this->listPostUseCase->execute($input);

            return $this->response
                ->json(ListPostResource::toArray($output->posts))
                ->withStatus(HttpStatus::OK);
        } catch (Throwable $exception) {
            return $this->response
                ->json(['message' => $exception->getMessage()])
                ->withStatus(HttpStatus::INTERNAL_SERVER_ERROR);
        }
    }
}
