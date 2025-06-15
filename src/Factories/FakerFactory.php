<?php

namespace Faker\Factories;

use Faker\Generators\Core;
use Faker\Generators\Lorem;
use Faker\Services\FakerService;
use Faker\Services\FakerServiceInterface;

class FakerFactory implements FakerFactoryInterface
{
    public function createFakerService(): FakerServiceInterface
    {
        return new FakerService(
            new Core(),
            new Lorem(),
        );
    }
}
