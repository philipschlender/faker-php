<?php

namespace Faker\Factories;

use Faker\Generators\Core;
use Faker\Generators\Fs;
use Faker\Generators\Lorem;
use Faker\Services\FakerService;
use Faker\Services\FakerServiceInterface;

class FakerServiceFactory implements FakerServiceFactoryInterface
{
    public function createFakerService(): FakerServiceInterface
    {
        $lorem = new Lorem();

        return new FakerService(
            new Core(),
            new Fs($lorem),
            $lorem,
        );
    }
}
