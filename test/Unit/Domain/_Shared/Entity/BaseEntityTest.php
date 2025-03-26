<?php

declare(strict_types=1);

namespace Test\Unit\Domain\_Shared\Entity;

use App\_Shared\Utils\Carbon;
use App\Domain\_Shared\Entity\BaseEntity;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class BaseEntityTest extends TestCase
{
    #[Test]
    public function idIsReturnedCorrectly(): void
    {
        $entity = $this->getMockForAbstractClass(BaseEntity::class);
        $reflection = new ReflectionClass($entity);
        $property = $reflection->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($entity, 1);

        $this->assertEquals(1, $entity->getId());
    }

    #[Test]
    public function createdAtIsReturnedCorrectly(): void
    {
        $entity = $this->getMockForAbstractClass(BaseEntity::class);
        $carbon = new Carbon();
        $reflection = new ReflectionClass($entity);
        $property = $reflection->getProperty('createdAt');
        $property->setAccessible(true);
        $property->setValue($entity, $carbon);

        $this->assertSame($carbon, $entity->getCreatedAt());
    }

    #[Test]
    public function updatedAtIsReturnedCorrectly(): void
    {
        $entity = $this->getMockForAbstractClass(BaseEntity::class);
        $carbon = new Carbon();
        $reflection = new ReflectionClass($entity);
        $property = $reflection->getProperty('updatedAt');
        $property->setAccessible(true);
        $property->setValue($entity, $carbon);

        $this->assertSame($carbon, $entity->getUpdatedAt());
    }
}
