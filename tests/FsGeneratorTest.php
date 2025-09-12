<?php

namespace Tests;

use Faker\Exceptions\FakerException;
use Faker\Generators\ArrayGenerator;
use Faker\Generators\FsGenerator;
use Faker\Generators\FsGeneratorInterface;
use Faker\Generators\LoremGenerator;
use PHPUnit\Framework\Attributes\DataProvider;

class FsGeneratorTest extends TestCase
{
    protected FsGeneratorInterface $fsGenerator;

    protected function setUp(): void
    {
        parent::setUp();

        $arrayGenerator = new ArrayGenerator();

        $this->fsGenerator = new FsGenerator($arrayGenerator, new LoremGenerator($arrayGenerator));
    }

    #[DataProvider('dataProviderRandomDirectory')]
    public function testRandomDirectory(int $depth, bool $absolutePath): void
    {
        $directory = $this->fsGenerator->randomDirectory($depth, $absolutePath);

        $this->assertMatchesRegularExpression('/^\/?([^\/]+\/)*[^\/]+$/', $directory);

        if ($absolutePath) {
            $this->assertEquals($depth, substr_count($directory, '/'));
            $this->assertStringStartsWith('/', $directory);
        } else {
            $this->assertEquals($depth - 1, substr_count($directory, '/'));
            $this->assertStringStartsNotWith('/', $directory);
        }
    }

    /**
     * @return array<int,array<string,mixed>>
     */
    public static function dataProviderRandomDirectory(): array
    {
        return [
            [
                'depth' => 1,
                'absolutePath' => false,
            ],
            [
                'depth' => 1,
                'absolutePath' => true,
            ],
            [
                'depth' => 2,
                'absolutePath' => false,
            ],
            [
                'depth' => 2,
                'absolutePath' => true,
            ],
        ];
    }

    public function testRandomDirectoryInvalidDepth(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The depth must be greater than or equal to 1.');

        $this->fsGenerator->randomDirectory(0);
    }

    #[DataProvider('dataProviderRandomFile')]
    public function testRandomFile(int $depth, bool $absolutePath): void
    {
        $file = $this->fsGenerator->randomFile($depth, $absolutePath);

        $this->assertMatchesRegularExpression('/^\/?([^\/]+\/)*[^\/]+\.[^\/]+$/', $file);

        if ($absolutePath) {
            $this->assertEquals($depth + 1, substr_count($file, '/'));
            $this->assertStringStartsWith('/', $file);
        } else {
            $this->assertEquals($depth, substr_count($file, '/'));
            $this->assertStringStartsNotWith('/', $file);
        }
    }

    /**
     * @return array<int,array<string,mixed>>
     */
    public static function dataProviderRandomFile(): array
    {
        return [
            [
                'depth' => 0,
                'absolutePath' => false,
            ],
            [
                'depth' => 0,
                'absolutePath' => true,
            ],
            [
                'depth' => 1,
                'absolutePath' => false,
            ],
            [
                'depth' => 1,
                'absolutePath' => true,
            ],
        ];
    }

    public function testRandomFileInvalidDepth(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The depth must be greater than or equal to 0.');

        $this->fsGenerator->randomFile(-1);
    }

    public function testRandomExtension(): void
    {
        $extension = $this->fsGenerator->randomExtension();

        $this->assertGreaterThan(0, strlen($extension));
    }
}
