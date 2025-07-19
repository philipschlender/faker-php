<?php

namespace Faker\Generators;

use Faker\Exceptions\FakerException;

interface CoreInterface
{
    public function randomBoolean(): bool;

    /**
     * @throws FakerException
     */
    public function randomFloat(float $minimum = 0.0, float $maximum = PHP_FLOAT_MAX, int $precision = 2): float;

    /**
     * @throws FakerException
     */
    public function randomInteger(int $minimum = 0, int $maximum = PHP_INT_MAX): int;

    /**
     * @throws FakerException
     */
    public function randomString(int $length = 32): string;

    /**
     * @param array<int|string,mixed> $array
     */
    public function randomElement(array $array): mixed;
}
