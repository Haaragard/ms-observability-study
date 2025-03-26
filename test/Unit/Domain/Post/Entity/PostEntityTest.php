<?php

declare(strict_types=1);

namespace Test\Unit\Domain\Post\Entity;

use App\_Shared\Utils\Carbon;
use App\Domain\Post\Entity\PostEntity;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class PostEntityTest extends TestCase
{
    #[Test]
    public function titleIsSetInConstructorAndRetrievedCorrectly(): void
    {
        $post = new PostEntity(
            id: 1,
            createdAt: new Carbon(),
            updatedAt: new Carbon(),
            title: 'Sample Title',
            slug: 'sample-title',
            content: 'Sample Content',
            score: 0
        );
        $this->assertEquals('Sample Title', $post->getTitle());
    }

    #[Test]
    public function contentIsSetInConstructorAndRetrievedCorrectly(): void
    {
        $post = new PostEntity(
            id: 1,
            createdAt: new Carbon(),
            updatedAt: new Carbon(),
            title: 'Sample Title',
            slug: 'sample-title',
            content: 'Sample Content',
            score: 0
        );
        $this->assertEquals('Sample Content', $post->getContent());
    }

    #[Test]
    public function slugIsSetInConstructorAndRetrievedCorrectly(): void
    {
        $post = new PostEntity(
            id: 1,
            createdAt: new Carbon(),
            updatedAt: new Carbon(),
            title: 'Sample Title',
            slug: 'sample-title',
            content: 'Sample Content',
            score: 0
        );
        $this->assertEquals('sample-title', $post->getSlug());
    }

    #[Test]
    public function scoreIsSetInConstructorAndRetrievedCorrectly(): void
    {
        $post = new PostEntity(
            id: 1,
            createdAt: new Carbon(),
            updatedAt: new Carbon(),
            title: 'Sample Title',
            slug: 'sample-title',
            content: 'Sample Content',
            score: 10
        );
        $this->assertEquals(10, $post->getScore());
    }
}
