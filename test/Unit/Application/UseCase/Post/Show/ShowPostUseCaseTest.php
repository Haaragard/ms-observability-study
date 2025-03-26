<?php

declare(strict_types=1);

namespace Test\Unit\Application\UseCase\Post\Show;

use App\Application\Exception\_Shared\EntityNotFoundException;
use App\Application\UseCase\Post\Show\ShowPostInputDto;
use App\Application\UseCase\Post\Show\ShowPostOutputDto;
use App\Application\UseCase\Post\Show\ShowPostUseCase;
use App\Domain\Post\Entity\PostEntityInterface;
use App\Infrastructure\Persistence\Mysql\Repository\Post\PostRepositoryInterface;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ShowPostUseCaseTest extends TestCase
{
    private PostRepositoryInterface|MockObject $postRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->postRepository = $this->createMock(PostRepositoryInterface::class);
    }

    #[Test]
    public function executeReturnsOutputDtoWithValidPost(): void
    {
        $inputDto = new ShowPostInputDto(id: 1);
        $postEntity = $this->createMock(PostEntityInterface::class);

        $this->postRepository->expects($this->once())
            ->method('find')
            ->with($inputDto->id)
            ->willReturn($postEntity);

        $useCase = new ShowPostUseCase($this->postRepository);
        $outputDto = $useCase->execute($inputDto);

        $this->assertInstanceOf(ShowPostOutputDto::class, $outputDto);
        $this->assertSame($postEntity, $outputDto->postEntity);
    }

    #[Test]
    public function executeThrowsExceptionWhenPostNotFound(): void
    {
        $this->expectException(EntityNotFoundException::class);
        $this->expectExceptionMessage('Post not found');

        $inputDto = new ShowPostInputDto(id: 1);

        $this->postRepository->expects($this->once())
            ->method('find')
            ->with($inputDto->id)
            ->willReturn(null);

        $useCase = new ShowPostUseCase($this->postRepository);
        $useCase->execute($inputDto);
    }
}
