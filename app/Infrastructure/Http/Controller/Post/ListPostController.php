<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller\Post;

use App\Application\UseCase\Post\List\ListPostInputDto;
use App\Application\UseCase\Post\List\ListPostUseCase;
use App\Infrastructure\Http\Controller\AbstractController;
use App\Infrastructure\Http\Resource\Post\ListPostResource;
use Psr\Http\Message\ResponseInterface;
use Swoole\Http\Status;

class ListPostController extends AbstractController
{
    public function __construct(
        private ListPostUseCase $listPostUseCase
    ) {
    }

    public function __invoke(): ResponseInterface
    {
        $input = new ListPostInputDto(
//            page: (int) $this->request->get['page'] ?? 1,
            page: 1,
//            perPage: (int) $this->request->get['per_page'] ?? 10
            perPage: 10
        );
        $output = $this->listPostUseCase->execute($input);

        return $this->response
            ->json(ListPostResource::toArray($output->posts))
            ->withStatus(Status::OK);
    }
}
