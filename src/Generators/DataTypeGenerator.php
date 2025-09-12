<?php

namespace Faker\Generators;

use Faker\Exceptions\FakerException;

class DataTypeGenerator implements DataTypeGeneratorInterface
{
    public function randomBoolean(): bool
    {
        return (bool) mt_rand(0, 1);
    }

    /**
     * @throws FakerException
     */
    public function randomFloat(float $minimum = 0.0, float $maximum = PHP_FLOAT_MAX, int $precision = 2): float
    {
        if ($minimum > $maximum) {
            throw new FakerException('The minimum must be less than the maximum.');
        }

        if ($precision < 0) {
            throw new FakerException('The precision must be greater than or equal to 0.');
        }

        $randomFloat = round(
            $minimum + (mt_rand() / mt_getrandmax() * ($maximum - $minimum)),
            $precision
        );

        return -0.0 !== $randomFloat ? $randomFloat : 0.0;
    }

    /**
     * @throws FakerException
     */
    public function randomInteger(int $minimum = 0, int $maximum = PHP_INT_MAX): int
    {
        if ($minimum > $maximum) {
            throw new FakerException('The minimum must be less than the maximum.');
        }

        $randomInteger = mt_rand($minimum, $maximum);

        return -0 !== $randomInteger ? $randomInteger : 0;
    }

    /**
     * @throws FakerException
     */
    public function randomString(int $length = 32): string
    {
        if ($length < 0) {
            throw new FakerException('The length must be greater than or equal to 0.');
        }

        $characters = array_merge(
            range('a', 'z'),
            range('A', 'Z')
        );

        $numberOfCharacters = count($characters);

        $randomString = '';

        for ($i = 0; $i < $length; ++$i) {
            $index = mt_rand(0, $numberOfCharacters - 1);

            $randomString = sprintf('%s%s', $randomString, $characters[$index]);
        }

        return $randomString;
    }
}
