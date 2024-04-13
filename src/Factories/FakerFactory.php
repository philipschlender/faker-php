<?php

namespace PhilipSchlender\Faker\Factories;

use PhilipSchlender\Faker\Generators\Core;
use PhilipSchlender\Faker\Services\FakerService;
use PhilipSchlender\Faker\Services\FakerServiceInterface;

class FakerFactory
{
    public static function createFakerService(): FakerServiceInterface
    {
        return new FakerService(
            new Core()
        );
    }
}
