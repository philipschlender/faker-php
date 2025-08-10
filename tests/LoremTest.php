<?php

namespace Tests;

use Faker\Generators\Core;
use Faker\Generators\Lorem;
use Faker\Generators\LoremInterface;

class LoremTest extends TestCase
{
    protected LoremInterface $lorem;

    protected function setUp(): void
    {
        parent::setUp();

        $this->lorem = new Lorem(new Core());
    }

    public function testRandomSentence(): void
    {
        $sentence = $this->lorem->randomSentence();

        $this->assertGreaterThan(0, strlen($sentence));
    }

    public function testRandomText(): void
    {
        $text = $this->lorem->randomText();

        $this->assertGreaterThan(0, strlen($text));
    }

    public function testRandomWord(): void
    {
        $word = $this->lorem->randomWord();

        $this->assertGreaterThan(0, strlen($word));
    }
}
