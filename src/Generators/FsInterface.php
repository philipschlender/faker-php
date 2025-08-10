<?php

namespace Faker\Generators;

use Faker\Exceptions\FakerException;

interface FsInterface
{
    /**
     * @throws FakerException
     */
    public function randomDirectory(int $depth = 1, bool $absolutePath = false): string;

    /**
     * @throws FakerException
     */
    public function randomFile(int $depth = 0, bool $absolutePath = false): string;

    public function randomExtension(): string;
}
