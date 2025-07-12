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
                'expectedMessage' => 'The minimum 1.00 must be less than the maximum 0.00.',
            ],
            [
                'minimum' => 0.0,
                'maximum' => 1.0,
                'precision' => -1,
                'expectedMessage' => 'The precision -1 must be greater than or equal to 0.',
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
        $this->expectExceptionMessage('The minimum 1 must be less than the maximum 0.');

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
        $this->expectExceptionMessage('The length -1 must be greater than or equal to 0.');

        $this->core->randomString(-1);
    }

    /**
     * @param array<int|string,mixed> $array
     */
    #[DataProvider('dataProviderRandomElement')]
    public function testRandomElement(array $array): void
    {
        $value = $this->core->randomElement($array);

        $this->assertTrue(in_array($value, $array));
    }

    /**
     * @return array<int,array<string,mixed>>
     */
    public static function dataProviderRandomElement(): array
    {
        return [
            [
                'array' => [
                    17,
                    'seventeen',
                ],
            ],
            [
                'array' => [
                    '0' => 17,
                    '1' => 'seventeen',
                ],
            ],
        ];
    }
}
