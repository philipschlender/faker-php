<?php

namespace Faker\Generators;

use Faker\Exceptions\FakerException;

class Core implements CoreInterface
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
            throw new FakerException(sprintf('The minimum %.2f must be less than the maximum %.2f.', $minimum, $maximum));
        }

        if ($precision < 0) {
            throw new FakerException(sprintf('The precision %d must be greater than or equal to 0.', $precision));
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
            throw new FakerException(sprintf('The minimum %d must be less than the maximum %d.', $minimum, $maximum));
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
            throw new FakerException(sprintf('The length %d must be greater than or equal to 0.', $length));
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

    /**
     * @param array<int|string,mixed> $array
     *
     * @throws FakerException
     */
    public function randomElement(array $array): mixed
    {
        if (empty($array)) {
            throw new FakerException('The array must contain at least one element.');
        }

        $index = array_rand($array);

        return $array[$index];
    }
}
