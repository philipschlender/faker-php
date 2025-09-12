<?php

namespace Faker\Services;

use Faker\Generators\DataTypeGeneratorInterface;
use Faker\Generators\FsInterface;
use Faker\Generators\LoremInterface;

interface FakerServiceInterface
{
    public function getDataTypeGenerator(): DataTypeGeneratorInterface;

    public function getFs(): FsInterface;

    public function getLorem(): LoremInterface;
}
