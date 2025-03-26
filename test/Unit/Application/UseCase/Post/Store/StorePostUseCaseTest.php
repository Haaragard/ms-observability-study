<?php

namespace Test\Unit\Application\UseCase\Post\Store;

use App\Application\UseCase\Post\Store\StorePostInputDto;
use App\Application\UseCase\Post\Store\StorePostOutputDto;
use App\Application\UseCase\Post\Store\StorePostUseCase;
use App\Domain\Post\Entity\PostEntityInterface;
use App\Domain\Post\Service\PostServiceInterface;
use App\Infrastructure\Persistence\Mysql\Repository\Post\PostRepositoryInterface;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class StorePostUseCaseTest extends TestCase
{
    private PostServiceInterface|MockObject $postService;

    private PostRepositoryInterface|MockObject $postRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->postService = $this->createMock(PostServiceInterface::class);
        $this->postRepository = $this->createMock(PostRepositoryInterface::class);
    }

    #[Test]
    public function executeCreatesPostWithValidInput(): void
    {
        $inputDto = new StorePostInputDto(title: 'Sample Title', content: 'Sample Content');
        $postEntity = $this->createMock(PostEntityInterface::class);
        $this->postService->expects(self::once())
            ->method('generateSlug')
            ->willReturn('sample-title');
        $this->postRepository->expects(self::once())
            ->method('create')
            ->willReturn($postEntity);

        $useCase = new StorePostUseCase($this->postRepository, $this->postService);
        $outputDto = $useCase->execute($inputDto);

        $this->assertInstanceOf(StorePostOutputDto::class, $outputDto);
        $this->assertSame($postEntity, $outputDto->post);
    }

    #[Test]
    public function executeHandlesEmptyTitle(): void
    {
        $inputDto = new StorePostInputDto(title: '', content: 'Sample Content');
        $postEntity = $this->createMock(PostEntityInterface::class);
        $this->postService->expects(self::once())
            ->method('generateSlug')
            ->willReturn('');
        $this->postRepository->expects(self::once())
            ->method('create')
            ->willReturn($postEntity);

        $useCase = new StorePostUseCase($this->postRepository, $this->postService);
        $outputDto = $useCase->execute($inputDto);

        $this->assertInstanceOf(StorePostOutputDto::class, $outputDto);
        $this->assertSame($postEntity, $outputDto->post);
    }

    #[Test]
    public function executeHandlesEmptyContent(): void
    {
        $inputDto = new StorePostInputDto(title: 'Sample Title', content: '');
        $postEntity = $this->createMock(PostEntityInterface::class);
        $this->postService->expects(self::once())
            ->method('generateSlug')
            ->willReturn('sample-title');
        $this->postRepository->expects(self::once())
            ->method('create')
            ->willReturn($postEntity);

        $useCase = new StorePostUseCase($this->postRepository, $this->postService);
        $outputDto = $useCase->execute($inputDto);

        $this->assertInstanceOf(StorePostOutputDto::class, $outputDto);
        $this->assertSame($postEntity, $outputDto->post);
    }

    #[Test]
    public function executeHandlesEmptyTitleAndContent(): void
    {
        $inputDto = new StorePostInputDto(title: '', content: '');
        $postEntity = $this->createMock(PostEntityInterface::class);
        $this->postService->expects(self::once())
            ->method('generateSlug')
            ->willReturn('');
        $this->postRepository->expects(self::once())
            ->method('create')
            ->willReturn($postEntity);

        $useCase = new StorePostUseCase($this->postRepository, $this->postService);
        $outputDto = $useCase->execute($inputDto);

        $this->assertInstanceOf(StorePostOutputDto::class, $outputDto);
        $this->assertSame($postEntity, $outputDto->post);
    }
}
