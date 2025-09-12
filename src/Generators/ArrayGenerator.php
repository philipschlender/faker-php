<?php

namespace Faker\Generators;

use Faker\Exceptions\FakerException;

class ArrayGenerator implements ArrayGeneratorInterface
{
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
