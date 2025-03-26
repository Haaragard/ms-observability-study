<?php

declare(strict_types=1);

namespace Test\Unit\Application\UseCase\Post\Show;

use App\Application\UseCase\Post\Show\ShowPostInputDto;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ShowPostInputDtoTest extends TestCase
{
    #[Test]
    public function showPostInputDtoConstructsWithValidId(): void
    {
        $inputDto = new ShowPostInputDto(id: 1);
        $this->assertSame(1, $inputDto->id);
    }

    #[Test]
    public function showPostInputDtoHandlesNegativeId(): void
    {
        $inputDto = new ShowPostInputDto(id: -1);
        $this->assertSame(-1, $inputDto->id);
    }

    #[Test]
    public function showPostInputDtoHandlesZeroId(): void
    {
        $inputDto = new ShowPostInputDto(id: 0);
        $this->assertSame(0, $inputDto->id);
    }
}
