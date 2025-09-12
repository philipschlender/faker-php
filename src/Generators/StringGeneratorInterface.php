<?php

namespace Faker\Generators;

use Faker\Exceptions\FakerException;

interface StringGeneratorInterface
{
    /**
     * @throws FakerException
     */
    public function randomBytes(int $length = 16): string;

    /**
     * @throws FakerException
     */
    public function randomHexadecimal(int $length = 32): string;
}
