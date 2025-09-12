<?php

namespace Tests;

use Faker\Generators\DataTypeGenerator;
use Faker\Generators\Fs;
use Faker\Generators\Lorem;

class FakerServiceTest extends TestCase
{
    public function testGetDataTypeGenerator(): void
    {
        $dataTypeGenerator = $this->fakerService->getDataTypeGenerator();

        $this->assertInstanceOf(DataTypeGenerator::class, $dataTypeGenerator);
    }

    public function testGetFs(): void
    {
        $fs = $this->fakerService->getFs();

        $this->assertInstanceOf(Fs::class, $fs);
    }

    public function testGetLorem(): void
    {
        $lorem = $this->fakerService->getLorem();

        $this->assertInstanceOf(Lorem::class, $lorem);
    }
}
