<?php

namespace Test\Unit\Application\UseCase\Post\List;

use App\_Shared\Utils\Collection;
use App\Application\UseCase\Post\List\ListPostInputDto;
use App\Application\UseCase\Post\List\ListPostOutputDto;
use App\Application\UseCase\Post\List\ListPostUseCase;
use App\Infrastructure\Persistence\Mysql\Repository\Post\Get\PaginateDto;
use App\Infrastructure\Persistence\Mysql\Repository\Post\PostRepositoryInterface;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ListPostUseCaseTest extends TestCase
{
    private PostRepositoryInterface|MockObject $postRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->postRepository = $this->createMock(PostRepositoryInterface::class);
    }

    #[Test]
    public function executeReturnsCorrectOutputDto(): void
    {
        $inputDto = new ListPostInputDto(page: 1, perPage: 10);
        $paginateDto = new PaginateDto(page: 1, perPage: 10);
        $entities = new Collection(['post1', 'post2']);

        $this->postRepository->expects($this->once())
            ->method('paginate')
            ->with($paginateDto)
            ->willReturn($entities);

        $useCase = new ListPostUseCase($this->postRepository);
        $outputDto = $useCase->execute($inputDto);

        $this->assertInstanceOf(ListPostOutputDto::class, $outputDto);
        $this->assertSame($entities, $outputDto->posts);
    }

    #[Test]
    public function executeHandlesEmptyPostsCollection(): void
    {
        $inputDto = new ListPostInputDto(page: 1, perPage: 10);
        $paginateDto = new PaginateDto(page: 1, perPage: 10);
        $entities = new Collection([]);

        $this->postRepository->expects($this->once())
            ->method('paginate')
            ->with($paginateDto)
            ->willReturn($entities);

        $useCase = new ListPostUseCase($this->postRepository);
        $outputDto = $useCase->execute($inputDto);

        $this->assertInstanceOf(ListPostOutputDto::class, $outputDto);
        $this->assertEmpty($outputDto->posts);
    }

    #[Test]
    public function executeHandlesCustomPageAndPerPage(): void
    {
        $inputDto = new ListPostInputDto(page: 2, perPage: 5);
        $paginateDto = new PaginateDto(page: 2, perPage: 5);
        $entities = new Collection(['post1', 'post2', 'post3', 'post4', 'post5']);

        $this->postRepository->expects($this->once())
            ->method('paginate')
            ->with($paginateDto)
            ->willReturn($entities);

        $useCase = new ListPostUseCase($this->postRepository);
        $outputDto = $useCase->execute($inputDto);

        $this->assertInstanceOf(ListPostOutputDto::class, $outputDto);
        $this->assertCount(5, $outputDto->posts);
    }
}
