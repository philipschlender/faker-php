<?php

namespace PhilipSchlender\Faker\Services;

use PhilipSchlender\Faker\Generators\CoreInterface;

class FakerService implements FakerServiceInterface
{
    public function __construct(
        protected CoreInterface $core
    ) {
    }

    public function getCore(): CoreInterface
    {
        return $this->core;
    }
}
