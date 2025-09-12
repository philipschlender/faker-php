<?php

namespace Tests;

use Faker\Exceptions\FakerException;
use Faker\Generators\StringGenerator;
use Faker\Generators\StringGeneratorInterface;

class StringGeneratorTest extends TestCase
{
    protected StringGeneratorInterface $stringGenerator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->stringGenerator = new StringGenerator();
    }

    public function testRandomBytes(): void
    {
        $length = 2;

        $value = $this->stringGenerator->randomBytes($length);

        $this->assertMatchesRegularExpression('/^[0-9a-f]+$/', bin2hex($value));
        $this->assertEquals($length, strlen($value));
    }

    public function testRandomBytesInvalidLength(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The length must be greater than or equal to 1.');

        $this->stringGenerator->randomBytes(0);
    }

    public function testRandomHexadecimal(): void
    {
        $length = 4;

        $value = $this->stringGenerator->randomHexadecimal($length);

        $this->assertMatchesRegularExpression('/^[0-9a-f]+$/', $value);
        $this->assertEquals($length, strlen($value));
    }

    public function testRandomHexadecimalInvalidLength(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The length must be greater than or equal to 0.');

        $this->stringGenerator->randomHexadecimal(-1);
    }
}
