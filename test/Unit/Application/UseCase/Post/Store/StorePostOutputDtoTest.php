<?php

declare(strict_types=1);

namespace Test\Unit\Application\UseCase\Post\Store;

use App\Application\UseCase\Post\Store\StorePostOutputDto;
use App\Domain\Post\Entity\PostEntityInterface;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class StorePostOutputDtoTest extends TestCase
{
    #[Test]
    public function storePostOutputDtoConstructsWithValidPostEntity(): void
    {
        $postEntity = $this->createMock(PostEntityInterface::class);
        $outputDto = new StorePostOutputDto($postEntity);
        $this->assertSame($postEntity, $outputDto->post);
    }
}
