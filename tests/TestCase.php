<?php

namespace PhilipSchlender\Faker\Tests;

use PhilipSchlender\Faker\Traits\FakerServiceTrait;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use FakerServiceTrait;

    protected function setUp(): void
    {
        parent::setUp();

        $this->createFakerService();
    }
}
