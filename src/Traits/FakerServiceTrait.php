<?php

namespace PhilipSchlender\Faker\Traits;

use PhilipSchlender\Faker\Services\FakerService;
use PhilipSchlender\Faker\Services\FakerServiceInterface;

trait FakerServiceTrait
{
    protected FakerServiceInterface $fakerService;

    protected function createFakerService(): void
    {
        $this->fakerService = new FakerService();
    }
}
