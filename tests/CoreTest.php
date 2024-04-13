<?php

namespace PhilipSchlender\Faker\Tests;

use PhilipSchlender\Faker\Generators\Core;
use PhilipSchlender\Faker\Generators\CoreInterface;

class CoreTest extends TestCase
{
    protected CoreInterface $core;

    protected function setUp(): void
    {
        parent::setUp();

        $this->core = new Core();
    }

    public function testRandomBoolean(): void
    {
        $value = $this->core->randomBoolean();

        $this->assertIsBool($value);
        $this->assertMatchesRegularExpression('/^[01]$/', (string) ((int) $value));
    }

    public function testRandomFloat(): void
    {
        $minimum = 0.0;
        $maximum = 17.0;
        $precision = 2;

        $value = $this->core->randomFloat($minimum, $maximum, $precision);

        $this->assertIsFloat($value);
        $this->assertMatchesRegularExpression(sprintf('/^-?[0-9]+\.?[0-9]{0,%d}$/', $precision), (string) $value);
        $this->assertGreaterThanOrEqual($minimum, $value);
        $this->assertLessThanOrEqual($maximum, $value);
    }

    public function testRandomInteger(): void
    {
        $minimum = 0;
        $maximum = 17;

        $value = $this->core->randomInteger($minimum, $maximum);

        $this->assertIsInt($value);
        $this->assertMatchesRegularExpression('/^-?[0-9]+$/', (string) $value);
        $this->assertGreaterThanOrEqual($minimum, $value);
        $this->assertLessThanOrEqual($maximum, $value);
    }

    public function testRandomString(): void
    {
        $length = 17;

        $value = $this->core->randomString($length);

        $this->assertIsString($value);
        $this->assertMatchesRegularExpression('/[a-zA-Z]+$/', $value);
        $this->assertEquals($length, strlen($value));
    }
}
