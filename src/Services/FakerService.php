<?php

namespace Faker\Services;

use Faker\Generators\CoreInterface;
use Faker\Generators\FsInterface;
use Faker\Generators\LoremInterface;

class FakerService implements FakerServiceInterface
{
    public function __construct(
        protected CoreInterface $core,
        protected FsInterface $fs,
        protected LoremInterface $lorem,
    ) {
    }

    public function getCore(): CoreInterface
    {
        return $this->core;
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
