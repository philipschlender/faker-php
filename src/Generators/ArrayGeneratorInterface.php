<?php

namespace Faker\Generators;

use Faker\Exceptions\FakerException;

interface ArrayGeneratorInterface
{
    /**
     * @param array<int|string,mixed> $array
     *
     * @throws FakerException
     */
    public function randomElement(array $array): mixed;
}
