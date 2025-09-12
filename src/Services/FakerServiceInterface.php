<?php

namespace Faker\Services;

use Faker\Generators\DataTypeGeneratorInterface;
use Faker\Generators\FsGeneratorInterface;
use Faker\Generators\LoremGeneratorInterface;
use Faker\Generators\StringGeneratorInterface;

interface FakerServiceInterface
{
    public function getDataTypeGenerator(): DataTypeGeneratorInterface;

    public function getFsGenerator(): FsGeneratorInterface;

    public function getLoremGenerator(): LoremGeneratorInterface;

    public function getStringGenerator(): StringGeneratorInterface;
}
