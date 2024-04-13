<?php

namespace PhilipSchlender\Faker\Generators;

class Core implements CoreInterface
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

    public function randomString(int $length = 32): string
    {
        $characters = array_merge(
            range('a', 'z'),
            range('A', 'Z')
        );

        $numberOfCharacters = count($characters);

        $randomString = '';

        for ($i = 0; $i < $length; ++$i) {
            $index = mt_rand(0, $numberOfCharacters - 1);

            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
