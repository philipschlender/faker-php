<?php

namespace Tests;

use Faker\Exceptions\FakerException;
use Faker\Generators\ArrayGenerator;
use Faker\Generators\ArrayGeneratorInterface;
use PHPUnit\Framework\Attributes\DataProvider;

class ArrayGeneratorTest extends TestCase
{
    protected ArrayGeneratorInterface $arrayGenerator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->arrayGenerator = new ArrayGenerator();
    }

    /**
     * @param array<int|string,mixed> $array
     */
    #[DataProvider('dataProviderRandomElement')]
    public function testRandomElement(array $array): void
    {
        $value = $this->arrayGenerator->randomElement($array);

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

        $this->arrayGenerator->randomElement([]);
    }
}
