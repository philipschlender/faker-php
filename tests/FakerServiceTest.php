<?php

namespace Tests;

use Faker\Generators\DataTypeGenerator;
use Faker\Generators\FsGenerator;
use Faker\Generators\LoremGenerator;

class FakerServiceTest extends TestCase
{
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
}
