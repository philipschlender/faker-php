<?php

namespace PhilipSchlender\Faker\Services;

interface FakerServiceInterface
{
    public function randomBoolean(): bool;

    public function randomFloat(float $minimum = 0.0, float $maximum = PHP_FLOAT_MAX, int $precision = 2): float;

    public function randomInteger(int $minimum = 0, int $maximum = PHP_INT_MAX): int;

    public function randomString(int $length = 32, bool $includeNumbers = true, bool $includeSpaces = true): string;
}
