<?php

namespace PhilipSchlender\Faker\Services;

use PhilipSchlender\Faker\Generators\CoreInterface;

interface FakerServiceInterface
{
    public function getCore(): CoreInterface;
}
