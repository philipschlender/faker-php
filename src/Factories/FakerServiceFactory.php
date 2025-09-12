<?php

namespace Faker\Factories;

use Faker\Generators\DataTypeGenerator;
use Faker\Generators\FsGenerator;
use Faker\Generators\Lorem;
use Faker\Services\FakerService;
use Faker\Services\FakerServiceInterface;

class FakerServiceFactory implements FakerServiceFactoryInterface
{
    public function createFakerService(): FakerServiceInterface
    {
        $dataTypeGenerator = new DataTypeGenerator();
        $lorem = new Lorem($dataTypeGenerator);
        $fsGenerator = new FsGenerator($dataTypeGenerator, $lorem);

        return new FakerService(
            $dataTypeGenerator,
            $fsGenerator,
            $lorem,
        );
    }
}
