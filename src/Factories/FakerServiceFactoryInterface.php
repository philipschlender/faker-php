<?php

namespace Faker\Factories;

use Faker\Services\FakerServiceInterface;

interface FakerServiceFactoryInterface
{
    public function createFakerService(): FakerServiceInterface;
}
