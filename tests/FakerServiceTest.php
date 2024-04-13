<?php

namespace PhilipSchlender\Faker\Tests;

use PhilipSchlender\Faker\Generators\CoreInterface;
use PhilipSchlender\Faker\Generators\LoremInterface;

class FakerServiceTest extends TestCase
{
    public function testGetCore(): void
    {
        $core = $this->fakerService->getCore();

        $this->assertInstanceOf(CoreInterface::class, $core);
    }

    public function testGetLorem(): void
    {
        $lorem = $this->fakerService->getLorem();

        $this->assertInstanceOf(LoremInterface::class, $lorem);
    }
}
