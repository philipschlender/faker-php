<?php

namespace Faker\Traits;

use Faker\Factories\FakerServiceFactory;
use Faker\Services\FakerServiceInterface;

trait FakerServiceTrait
{
    protected FakerServiceInterface $fakerService;

    protected function createFakerService(): void
    {
        $fakerServiceFactory = new FakerServiceFactory();

        $this->fakerService = $fakerServiceFactory->createFakerService();
    }
}
