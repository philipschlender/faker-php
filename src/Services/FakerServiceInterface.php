<?php

namespace Faker\Services;

use Faker\Generators\CoreInterface;
use Faker\Generators\FsInterface;
use Faker\Generators\LoremInterface;

interface FakerServiceInterface
{
    public function getCore(): CoreInterface;

    public function getFs(): FsInterface;

    public function getLorem(): LoremInterface;
}
