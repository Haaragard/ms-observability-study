<?php

declare(strict_types=1);

namespace Test\Unit\Application\UseCase\Post\List;

use App\Application\UseCase\Post\List\ListPostInputDto;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ListPostInputDtoTest extends TestCase
{
    #[Test]
    public function defaultPageIsOne(): void
    {
        $inputDto = new ListPostInputDto();
        $this->assertEquals(1, $inputDto->page);
    }

    #[Test]
    public function defaultPerPageIsTen(): void
    {
        $inputDto = new ListPostInputDto();
        $this->assertEquals(10, $inputDto->perPage);
    }

    #[Test]
    public function customPageIsSetCorrectly(): void
    {
        $inputDto = new ListPostInputDto(page: 5);
        $this->assertEquals(5, $inputDto->page);
    }

    #[Test]
    public function customPerPageIsSetCorrectly(): void
    {
        $inputDto = new ListPostInputDto(perPage: 20);
        $this->assertEquals(20, $inputDto->perPage);
    }

    #[Test]
    public function customPageAndPerPageAreSetCorrectly(): void
    {
        $inputDto = new ListPostInputDto(page: 3, perPage: 15);
        $this->assertEquals(3, $inputDto->page);
        $this->assertEquals(15, $inputDto->perPage);
    }
}
