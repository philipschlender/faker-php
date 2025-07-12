<?php

namespace Faker\Generators;

interface FsInterface
{
    public function randomDirectory(int $depth = 1, bool $absolutePath = false): string;

    public function randomFile(int $depth = 0, bool $absolutePath = false): string;

    public function randomExtension(): string;
}
