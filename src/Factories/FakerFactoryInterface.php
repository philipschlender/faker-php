<?php

namespace Faker\Factories;

use Faker\Services\FakerServiceInterface;

interface FakerFactoryInterface
{
    public function createFakerService(): FakerServiceInterface;
}
