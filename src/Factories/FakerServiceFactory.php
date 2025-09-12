<?php

namespace Faker\Factories;

use Faker\Generators\DataTypeGenerator;
use Faker\Generators\Fs;
use Faker\Generators\Lorem;
use Faker\Services\FakerService;
use Faker\Services\FakerServiceInterface;

class FakerServiceFactory implements FakerServiceFactoryInterface
{
    public function createFakerService(): FakerServiceInterface
    {
        $dataTypeGenerator = new DataTypeGenerator();
        $lorem = new Lorem($dataTypeGenerator);
        $fs = new Fs($dataTypeGenerator, $lorem);

        return new FakerService(
            $dataTypeGenerator,
            $fs,
            $lorem,
        );
    }
}
