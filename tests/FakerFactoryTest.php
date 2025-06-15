<?php

namespace Tests;

use Faker\Factories\FakerFactory;
use Faker\Factories\FakerFactoryInterface;
use Faker\Services\FakerService;

class FakerFactoryTest extends TestCase
{
    protected FakerFactoryInterface $fakerFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fakerFactory = new FakerFactory();
    }

    public function testCreateFakerService(): void
    {
        $fakerService = $this->fakerFactory->createFakerService();

        $this->assertInstanceOf(FakerService::class, $fakerService);
    }
}
