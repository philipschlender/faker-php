<?php

namespace PhilipSchlender\Faker\Traits;

use PhilipSchlender\Faker\Factories\FakerFactory;
use PhilipSchlender\Faker\Services\FakerServiceInterface;

trait FakerServiceTrait
{
    protected FakerServiceInterface $fakerService;

    protected function createFakerService(): void
    {
        $this->fakerService = FakerFactory::createFakerService();
    }
}
