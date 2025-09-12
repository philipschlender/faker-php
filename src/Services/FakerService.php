<?php

namespace Faker\Services;

use Faker\Generators\DataTypeGeneratorInterface;
use Faker\Generators\FsGeneratorInterface;
use Faker\Generators\LoremGeneratorInterface;

class FakerService implements FakerServiceInterface
{
    public function __construct(
        protected DataTypeGeneratorInterface $dataTypeGenerator,
        protected FsGeneratorInterface $fsGenerator,
        protected LoremGeneratorInterface $loremGenerator,
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
}
