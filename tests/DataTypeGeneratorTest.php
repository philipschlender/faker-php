<?php

namespace Tests;

use Faker\Exceptions\FakerException;
use Faker\Generators\DataTypeGenerator;
use Faker\Generators\DataTypeGeneratorInterface;
use PHPUnit\Framework\Attributes\DataProvider;

class DataTypeGeneratorTest extends TestCase
{
    protected DataTypeGeneratorInterface $dataTypeGenerator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dataTypeGenerator = new DataTypeGenerator();
    }

    public function testRandomBoolean(): void
    {
        $value = $this->dataTypeGenerator->randomBoolean();

        $this->assertMatchesRegularExpression('/^[01]$/', (string) ((int) $value));
    }

    public function testRandomFloat(): void
    {
        $minimum = 0.0;
        $maximum = 17.0;
        $precision = 2;

        $value = $this->dataTypeGenerator->randomFloat($minimum, $maximum, $precision);

        $this->assertMatchesRegularExpression(sprintf('/^-?[0-9]+\.?[0-9]{0,%d}$/', $precision), (string) $value);
        $this->assertGreaterThanOrEqual($minimum, $value);
        $this->assertLessThanOrEqual($maximum, $value);
    }

    public function testRandomFloatInvalidMinimumAndMaximum(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The minimum must be less than the maximum.');

        $this->dataTypeGenerator->randomFloat(1.0, 0.0, 2);
    }

    public function testRandomFloatInvalidPrecision(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The precision must be greater than or equal to 0.');

        $this->dataTypeGenerator->randomFloat(0.0, 1.0, -1);
    }

    public function testRandomInteger(): void
    {
        $minimum = 0;
        $maximum = 17;

        $value = $this->dataTypeGenerator->randomInteger($minimum, $maximum);

        $this->assertMatchesRegularExpression('/^-?[0-9]+$/', (string) $value);
        $this->assertGreaterThanOrEqual($minimum, $value);
        $this->assertLessThanOrEqual($maximum, $value);
    }

    public function testRandomIntegerInvalidMinimumAndMaximum(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The minimum must be less than the maximum.');

        $this->dataTypeGenerator->randomInteger(1, 0);
    }

    public function testRandomString(): void
    {
        $length = 17;

        $value = $this->dataTypeGenerator->randomString($length);

        $this->assertMatchesRegularExpression('/[a-zA-Z]+$/', $value);
        $this->assertEquals($length, strlen($value));
    }

    public function testRandomStringInvalidLength(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The length must be greater than or equal to 0.');

        $this->dataTypeGenerator->randomString(-1);
    }

    /**
     * @param array<int|string,mixed> $array
     */
    #[DataProvider('dataProviderRandomElement')]
    public function testRandomElement(array $array): void
    {
        $value = $this->dataTypeGenerator->randomElement($array);

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

    public function testRandomElementArrayEmpty(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The array must contain at least one element.');

        $this->dataTypeGenerator->randomElement([]);
    }
}
