<?php

namespace PhilipSchlender\Faker\Services;

class FakerService implements FakerServiceInterface
{
    public function randomBoolean(): bool
    {
        return (bool) mt_rand(0, 1);
    }

    public function randomFloat(float $minimum = 0.0, float $maximum = PHP_FLOAT_MAX, int $precision = 2): float
    {
        $randomFloat = round(
            $minimum + (mt_rand() / mt_getrandmax() * ($maximum - $minimum)),
            $precision
        );

        return -0.0 !== $randomFloat ? $randomFloat : 0.0;
    }

    public function randomInteger(int $minimum = 0, int $maximum = PHP_INT_MAX): int
    {
        $randomInteger = mt_rand($minimum, $maximum);

        return -0 !== $randomInteger ? $randomInteger : 0;
    }

    public function randomString(int $length = 32, bool $includeNumbers = true, bool $includeSpaces = true): string
    {
        $characters = array_merge(
            range('a', 'z'),
            range('A', 'Z')
        );

        if ($includeNumbers) {
            $characters = array_merge($characters, range(0, 9));
        }

        if ($includeSpaces) {
            $characters = array_merge($characters, [' ']);
        }

        $randomString = '';

        for ($i = 0; $i < $length; ++$i) {
            $randomString .= $characters[mt_rand(0, count($characters) - 1)];
        }

        return $randomString;
    }
}
