<?php

namespace Tests;

use Faker\Generators\ArrayGenerator;
use Faker\Generators\DataTypeGenerator;
use Faker\Generators\FsGenerator;
use Faker\Generators\LoremGenerator;
use Faker\Generators\StringGenerator;

class FakerServiceTest extends TestCase
{
    public function testGetArrayGenerator(): void
    {
        $arrayGenerator = $this->fakerService->getArrayGenerator();

        $this->assertInstanceOf(ArrayGenerator::class, $arrayGenerator);
    }

    public function testGetDataTypeGenerator(): void
    {
        $dataTypeGenerator = $this->fakerService->getDataTypeGenerator();

        $this->assertInstanceOf(DataTypeGenerator::class, $dataTypeGenerator);
    }

    public function testGetFsGenerator(): void
    {
        $fsGenerator = $this->fakerService->getFsGenerator();

        $this->assertInstanceOf(FsGenerator::class, $fsGenerator);
    }

    public function testGetLoremGenerator(): void
    {
        $loremGenerator = $this->fakerService->getLoremGenerator();

        $this->assertInstanceOf(LoremGenerator::class, $loremGenerator);
    }

    public function testGetStringGenerator(): void
    {
        $stringGenerator = $this->fakerService->getStringGenerator();

        $this->assertInstanceOf(StringGenerator::class, $stringGenerator);
    }
}
