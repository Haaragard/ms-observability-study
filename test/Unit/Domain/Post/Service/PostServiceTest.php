<?php

declare(strict_types=1);

namespace Test\Unit\Domain\Post\Service;

use App\Domain\Post\Service\PostService;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class PostServiceTest extends TestCase
{
    #[Test]
    #[DataProvider('slugGenerationProvider')]
    public function slugIsGeneratedCorrectly(string $title, string $expectedSlug): void
    {
        $postService = new PostService();
        $slug = $postService->generateSlug($title);
        $this->assertEquals($expectedSlug, $slug);
    }

    public static function slugGenerationProvider(): array
    {
        return [
            'normal title' => [
                'title' => 'Sample Title',
                'expectedSlug' => 'sample-title',
            ],
            'title with special characters' => [
                'title' => 'Sample Title!!!',
                'expectedSlug' => 'sample-title',
            ],
            'title with spaces' => [
                'title' => '   Sample   Title   ',
                'expectedSlug' => 'sample-title',
            ],
            'empty title' => [
                'title' => '',
                'expectedSlug' => '',
            ],
            'title with accents' => [
                'title' => 'Título com Acentos',
                'expectedSlug' => 'titulo-com-acentos',
            ],
        ];
    }
}
