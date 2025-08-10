<?php

namespace Tests;

use Faker\Factories\FakerServiceFactory;
use Faker\Factories\FakerServiceFactoryInterface;
use Faker\Services\FakerService;

class FakerServiceFactoryTest extends TestCase
{
    protected FakerServiceFactoryInterface $fakerServiceFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fakerServiceFactory = new FakerServiceFactory();
    }

    public function testCreateFakerService(): void
    {
        $fakerService = $this->fakerServiceFactory->createFakerService();

        $this->assertInstanceOf(FakerService::class, $fakerService);
    }
}
