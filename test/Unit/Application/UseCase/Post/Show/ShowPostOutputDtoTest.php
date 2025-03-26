<?php

declare(strict_types=1);

namespace Test\Unit\Application\UseCase\Post\Show;

use App\Application\UseCase\Post\Show\ShowPostOutputDto;
use App\Domain\Post\Entity\PostEntityInterface;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ShowPostOutputDtoTest extends TestCase
{
    #[Test]
    public function showPostOutputDtoConstructsWithValidPostEntity(): void
    {
        $postEntity = $this->createMock(PostEntityInterface::class);
        $outputDto = new ShowPostOutputDto($postEntity);
        $this->assertSame($postEntity, $outputDto->postEntity);
    }
}
