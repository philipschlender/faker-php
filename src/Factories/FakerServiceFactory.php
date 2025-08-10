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
        $core = new Core();
        $lorem = new Lorem($core);
        $fs = new Fs($core, $lorem);

        return new FakerService(
            $core,
            $fs,
            $lorem,
        );
    }
}
