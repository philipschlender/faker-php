<?php

namespace PhilipSchlender\Faker\Tests;

use PhilipSchlender\Faker\Generators\CoreInterface;

class FakerServiceTest extends TestCase
{
    public function testGetCore(): void
    {
        $core = $this->fakerService->getCore();

        $this->assertInstanceOf(CoreInterface::class, $core);
    }
}
