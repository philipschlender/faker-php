<?php

namespace Faker\Services;

use Faker\Generators\DataTypeGeneratorInterface;
use Faker\Generators\FsGeneratorInterface;
use Faker\Generators\LoremGeneratorInterface;
use Faker\Generators\StringGenerator;
use Faker\Generators\StringGeneratorInterface;

class FakerService implements FakerServiceInterface
{
    public function __construct(
        protected DataTypeGeneratorInterface $dataTypeGenerator,
        protected FsGeneratorInterface $fsGenerator,
        protected LoremGeneratorInterface $loremGenerator,
        protected StringGenerator $stringGenerator,
    ) {
    }

    public function getDataTypeGenerator(): DataTypeGeneratorInterface
    {
        return $this->dataTypeGenerator;
    }

    public function getFsGenerator(): FsGeneratorInterface
    {
        return $this->fsGenerator;
    }

    public function getLoremGenerator(): LoremGeneratorInterface
    {
        return $this->loremGenerator;
    }

    public function getStringGenerator(): StringGeneratorInterface
    {
        return $this->stringGenerator;
    }
}
