<?php

namespace Faker\Services;

use Faker\Generators\CoreInterface;
use Faker\Generators\LoremInterface;

class FakerService implements FakerServiceInterface
{
    public function __construct(
        protected CoreInterface $core,
        protected LoremInterface $lorem,
    ) {
    }

    public function getCore(): CoreInterface
    {
        return $this->core;
    }

    public function getLorem(): LoremInterface
    {
        return $this->lorem;
    }
}
