<?php

namespace PhilipSchlender\Faker\Tests;

class FakerServiceTest extends TestCase
{
    public function testRandomBoolean(): void
    {
        $value = $this->fakerService->randomBoolean();

        $this->assertIsBool($value);
        $this->assertMatchesRegularExpression('/^[01]$/', (string) ((int) $value));
    }

    public function testRandomFloat(): void
    {
        $minimum = 0.0;
        $maximum = 17.0;
        $precision = 2;

        $value = $this->fakerService->randomFloat($minimum, $maximum, $precision);

        $this->assertIsFloat($value);
        $this->assertMatchesRegularExpression(sprintf('/^-?[0-9]+\.?[0-9]{0,%d}$/', $precision), (string) $value);
        $this->assertGreaterThanOrEqual($minimum, $value);
        $this->assertLessThanOrEqual($maximum, $value);
    }

    public function testRandomInteger(): void
    {
        $minimum = 0;
        $maximum = 17;

        $value = $this->fakerService->randomInteger($minimum, $maximum);

        $this->assertIsInt($value);
        $this->assertMatchesRegularExpression('/^-?[0-9]+$/', (string) $value);
        $this->assertGreaterThanOrEqual($minimum, $value);
        $this->assertLessThanOrEqual($maximum, $value);
    }

    public function testRandomString(): void
    {
        $length = 17;

        $value = $this->fakerService->randomString($length);

        $this->assertIsString($value);
        $this->assertMatchesRegularExpression('/[a-zA-Z]+$/', $value);
        $this->assertEquals($length, strlen($value));
    }
}
