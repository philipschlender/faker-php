<?php

namespace Faker\Traits;

use Faker\Factories\FakerFactory;
use Faker\Services\FakerServiceInterface;

trait FakerServiceTrait
{
    protected FakerServiceInterface $fakerService;

    protected function createFakerService(): void
    {
        $fakerFactory = new FakerFactory();

        $this->fakerService = $fakerFactory->createFakerService();
    }
}
