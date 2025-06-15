<?php

namespace Faker\Services;

use Faker\Generators\CoreInterface;
use Faker\Generators\LoremInterface;

interface FakerServiceInterface
{
    public function getCore(): CoreInterface;

    public function getLorem(): LoremInterface;
}
