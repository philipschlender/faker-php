<?php

namespace Tests;

use Faker\Exceptions\FakerException;
use Faker\Generators\Core;
use Faker\Generators\Fs;
use Faker\Generators\FsInterface;
use Faker\Generators\Lorem;
use PHPUnit\Framework\Attributes\DataProvider;

class FsTest extends TestCase
{
    protected FsInterface $fs;

    protected function setUp(): void
    {
        parent::setUp();

        $core = new Core();

        $this->fs = new Fs($core, new Lorem($core));
    }

    #[DataProvider('dataProviderRandomDirectory')]
    public function testRandomDirectory(int $depth, bool $absolutePath): void
    {
        $directory = $this->fs->randomDirectory($depth, $absolutePath);

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

    public function testRandomDirectoryException(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The depth 0 must be greater than or equal to 1.');

        $this->fs->randomDirectory(0);
    }

    #[DataProvider('dataProviderRandomFile')]
    public function testRandomFile(int $depth, bool $absolutePath): void
    {
        $file = $this->fs->randomFile($depth, $absolutePath);

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

    public function testRandomFileException(): void
    {
        $this->expectException(FakerException::class);
        $this->expectExceptionMessage('The depth -1 must be greater than or equal to 0.');

        $this->fs->randomFile(-1);
    }

    public function testRandomExtension(): void
    {
        $extension = $this->fs->randomExtension();

        $this->assertGreaterThan(0, strlen($extension));
    }
}
