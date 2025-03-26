<?php

declare(strict_types=1);

namespace Test\Unit\Application\UseCase\Post\Store;

use App\Application\UseCase\Post\Store\StorePostInputDto;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class StorePostInputDtoTest extends TestCase
{
    #[Test]
    public function storePostInputDtoConstructsWithValidTitleAndContent(): void
    {
        $inputDto = new StorePostInputDto(title: 'Sample Title', content: 'Sample Content');
        $this->assertSame('Sample Title', $inputDto->title);
        $this->assertSame('Sample Content', $inputDto->content);
    }

    #[Test]
    public function storePostInputDtoHandlesEmptyTitle(): void
    {
        $inputDto = new StorePostInputDto(title: '', content: 'Sample Content');
        $this->assertSame('', $inputDto->title);
        $this->assertSame('Sample Content', $inputDto->content);
    }

    #[Test]
    public function storePostInputDtoHandlesEmptyContent(): void
    {
        $inputDto = new StorePostInputDto(title: 'Sample Title', content: '');
        $this->assertSame('Sample Title', $inputDto->title);
        $this->assertSame('', $inputDto->content);
    }

    #[Test]
    public function storePostInputDtoHandlesEmptyTitleAndContent(): void
    {
        $inputDto = new StorePostInputDto(title: '', content: '');
        $this->assertSame('', $inputDto->title);
        $this->assertSame('', $inputDto->content);
    }
}
