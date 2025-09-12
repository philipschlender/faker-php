<?php

namespace Faker\Generators;

use Faker\Exceptions\FakerException;

class StringGenerator implements StringGeneratorInterface
{
    /**
     * @throws FakerException
     */
    public function randomBytes(int $length = 16): string
    {
        if ($length < 1) {
            throw new FakerException('The length must be greater than or equal to 1.');
        }

        return random_bytes($length);
    }

    /**
     * @throws FakerException
     */
    public function randomHexadecimal(int $length = 32): string
    {
        if ($length < 0) {
            throw new FakerException('The length must be greater than or equal to 0.');
        }

        $characters = array_merge(
            range('0', '9'),
            range('a', 'f')
        );

        $numberOfCharacters = count($characters);

        $randomHexadecimal = '';

        for ($i = 0; $i < $length; ++$i) {
            $index = mt_rand(0, $numberOfCharacters - 1);

            $randomHexadecimal = sprintf('%s%s', $randomHexadecimal, $characters[$index]);
        }

        return $randomHexadecimal;
    }
}
