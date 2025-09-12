<?php

namespace Faker\Factories;

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
        $dataTypeGenerator = new DataTypeGenerator();
        $loremGenerator = new LoremGenerator($dataTypeGenerator);
        $fsGenerator = new FsGenerator($dataTypeGenerator, $loremGenerator);
        $stringGenerator = new StringGenerator();

        return new FakerService(
            $dataTypeGenerator,
            $fsGenerator,
            $loremGenerator,
            $stringGenerator,
        );
    }
}
