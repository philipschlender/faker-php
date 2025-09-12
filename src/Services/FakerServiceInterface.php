<?php

namespace Faker\Services;

use Faker\Generators\DataTypeGeneratorInterface;
use Faker\Generators\FsGeneratorInterface;
use Faker\Generators\LoremInterface;

interface FakerServiceInterface
{
    public function getDataTypeGenerator(): DataTypeGeneratorInterface;

    public function getFsGenerator(): FsGeneratorInterface;

    public function getLorem(): LoremInterface;
}
