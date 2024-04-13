<?php

namespace PhilipSchlender\Faker\Services;

use PhilipSchlender\Faker\Generators\CoreInterface;
use PhilipSchlender\Faker\Generators\LoremInterface;

interface FakerServiceInterface
{
    public function getCore(): CoreInterface;

    public function getLorem(): LoremInterface;
}
