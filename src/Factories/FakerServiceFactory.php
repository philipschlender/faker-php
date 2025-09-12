<?php

namespace Faker\Factories;

use Faker\Generators\ArrayGenerator;
use Faker\Generators\DataTypeGenerator;
use Faker\Generators\FsGenerator;
use Faker\Generators\LoremGenerator;
use Faker\Generators\StringGenerator;
use Faker\Services\FakerService;
use Faker\Services\FakerServiceInterface;

class FakerServiceFactory implements FakerServiceFactoryInterface
{
    public function createFakerService(): FakerServiceInterface
    {
        $arrayGenerator = new ArrayGenerator();
        $dataTypeGenerator = new DataTypeGenerator();
        $loremGenerator = new LoremGenerator($arrayGenerator);
        $fsGenerator = new FsGenerator($arrayGenerator, $loremGenerator);
        $stringGenerator = new StringGenerator();

        return new FakerService(
            $arrayGenerator,
            $dataTypeGenerator,
            $fsGenerator,
            $loremGenerator,
            $stringGenerator,
        );
    }
}
