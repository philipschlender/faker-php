<?php

namespace Tests;

use Faker\Generators\Core;
use Faker\Generators\Lorem;

class FakerServiceTest extends TestCase
{
    public function testGetCore(): void
    {
        $core = $this->fakerService->getCore();

        $this->assertInstanceOf(Core::class, $core);
    }

    public function testGetLorem(): void
    {
        $lorem = $this->fakerService->getLorem();

        $this->assertInstanceOf(Lorem::class, $lorem);
    }
}
