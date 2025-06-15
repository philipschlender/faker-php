<?php

namespace Tests;

use Faker\Exceptions\FakerException;
use Faker\Generators\Core;
use Faker\Generators\CoreInterface;
use PHPUnit\Framework\Attributes\DataProvider;

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

        $this->assertMatchesRegularExpression('/^[01]$/', (string) ((int) $value));
    }

    public function testRandomFloat(): void
    {
        $minimum = 0.0;
        $maximum = 17.0;
        $precision = 2;

        $value = $this->core->randomFloat($minimum, $maximum, $precision);

        $this->assertMatchesRegularExpression(sprintf('/^-?[0-9]+\.?[0-9]{0,%d}$/', $precision), (string) $value);
        $this->assertGreaterThanOrEqual($minimum, $value);
        $this->assertLessThanOrEqual($maximum, $value);
    }

    #[DataProvider('dataProviderRandomFloatException')]
    public function testRandomFloatException(float $minimum, float $maximum, int $precision, string $expectedMessage): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage($expectedMessage);

        $this->core->randomFloat($minimum, $maximum, $precision);
    }

    /**
     * @return array<int,array<string,mixed>>
     */
    public static function dataProviderRandomFloatException(): array
    {
        return [
            [
                'minimum' => 1.0,
                'maximum' => 0.0,
                'precision' => 2,
                'expectedMessage' => 'The minimum must be less than the maximum.',
            ],
            [
                'minimum' => 0.0,
                'maximum' => 1.0,
                'precision' => -1,
                'expectedMessage' => 'The precision must be greater than or equal to 0.',
            ],
        ];
    }

    public function testRandomInteger(): void
    {
        $minimum = 0;
        $maximum = 17;

        $value = $this->core->randomInteger($minimum, $maximum);

        $this->assertMatchesRegularExpression('/^-?[0-9]+$/', (string) $value);
        $this->assertGreaterThanOrEqual($minimum, $value);
        $this->assertLessThanOrEqual($maximum, $value);
    }

    public function testRandomIntegerException(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The minimum must be less than the maximum.');

        $this->core->randomInteger(1, 0);
    }

    public function testRandomString(): void
    {
        $length = 17;

        $value = $this->core->randomString($length);

        $this->assertMatchesRegularExpression('/[a-zA-Z]+$/', $value);
        $this->assertEquals($length, strlen($value));
    }

    public function testRandomStringException(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The length must be greater than or equal to 0.');

        $this->core->randomString(-1);
    }
}
