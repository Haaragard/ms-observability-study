<?php

namespace Test\Unit\Application\UseCase\Post\List;

use App\_Shared\Utils\Collection;
use App\Application\UseCase\Post\List\ListPostOutputDto;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ListPostOutputDtoTest extends TestCase
{
    #[Test]
    public function postsCollectionIsSetCorrectly(): void
    {
        $posts = new Collection(['post1', 'post2']);
        $outputDto = new ListPostOutputDto($posts);
        $this->assertSame($posts, $outputDto->posts);
    }

    #[Test]
    public function postsCollectionIsEmpty(): void
    {
        $posts = new Collection([]);
        $outputDto = new ListPostOutputDto($posts);
        $this->assertEmpty($outputDto->posts);
    }

    #[Test]
    public function postsCollectionContainsMultipleItems(): void
    {
        $posts = new Collection(['post1', 'post2', 'post3']);
        $outputDto = new ListPostOutputDto($posts);
        $this->assertCount(3, $outputDto->posts);
    }
}
