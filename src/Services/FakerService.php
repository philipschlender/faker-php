<?php

namespace PhilipSchlender\Faker\Services;

use PhilipSchlender\Faker\Generators\CoreInterface;
use PhilipSchlender\Faker\Generators\LoremInterface;

class FakerService implements FakerServiceInterface
{
    public function __construct(
        protected CoreInterface $core,
        protected LoremInterface $lorem
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
