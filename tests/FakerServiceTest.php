<?php

namespace Tests;

use Faker\Generators\DataTypeGenerator;
use Faker\Generators\FsGenerator;
use Faker\Generators\Lorem;

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

    public function testGetLorem(): void
    {
        $lorem = $this->fakerService->getLorem();

        $this->assertInstanceOf(Lorem::class, $lorem);
    }
}
