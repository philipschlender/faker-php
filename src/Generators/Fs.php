<?php

namespace Faker\Generators;

use Faker\Exceptions\FakerException;

class Fs implements FsInterface
{
    /**
     * @var array<int,string>
     */
    protected array $extensions;

    public function __construct(
        protected LoremInterface $lorem,
    ) {
        $this->extensions = $this->getExtensions();
    }

    /**
     * @throws FakerException
     */
    public function randomDirectory(int $depth = 1, bool $absolutePath = false): string
    {
        if ($depth < 1) {
            throw new FakerException(sprintf('The depth %d must be greater than or equal to 1.', $depth));
        }

        $directory = '';

        for ($i = 0; $i < $depth; ++$i) {
            $directory = sprintf('%s/%s', $directory, $this->lorem->randomWord());
        }

        if (!$absolutePath) {
            $directory = substr($directory, 1);
        }

        return $directory;
    }

    /**
     * @throws FakerException
     */
    public function randomFile(int $depth = 0, bool $absolutePath = false): string
    {
        if ($depth < 0) {
            throw new FakerException(sprintf('The depth %d must be greater than or equal to 0.', $depth));
        }

        $directory = $depth > 0 ? $this->randomDirectory($depth, true) : '';

        $file = sprintf('%s/%s.%s', $directory, $this->lorem->randomWord(), $this->randomExtension());

        if (!$absolutePath) {
            $file = substr($file, 1);
        }

        return $file;
    }

    public function randomExtension(): string
    {
        $index = mt_rand(0, count($this->extensions) - 1);

        return $this->extensions[$index];
    }

    /**
     * @return array<int,string>
     */
    protected function getExtensions(): array
    {
        return [
            'txt',
        ];
    }
}
