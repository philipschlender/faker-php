<?php

namespace Faker\Services;

use Faker\Generators\DataTypeGeneratorInterface;
use Faker\Generators\FsInterface;
use Faker\Generators\LoremInterface;

class FakerService implements FakerServiceInterface
{
    public function __construct(
        protected DataTypeGeneratorInterface $dataTypeGenerator,
        protected FsInterface $fs,
        protected LoremInterface $lorem,
    ) {
    }

    public function getDataTypeGenerator(): DataTypeGeneratorInterface
    {
        return $this->dataTypeGenerator;
    }

    public function getFs(): FsInterface
    {
        return $this->fs;
    }

    public function getLorem(): LoremInterface
    {
        return $this->lorem;
    }
}
