<?php

namespace Faker\Services;

use Faker\Generators\DataTypeGeneratorInterface;
use Faker\Generators\FsGeneratorInterface;
use Faker\Generators\LoremInterface;

class FakerService implements FakerServiceInterface
{
    public function __construct(
        protected DataTypeGeneratorInterface $dataTypeGenerator,
        protected FsGeneratorInterface $fsGenerator,
        protected LoremInterface $lorem,
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

    public function getLorem(): LoremInterface
    {
        return $this->lorem;
    }
}
