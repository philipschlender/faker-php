<?php

namespace PhilipSchlender\Faker\Tests;

use PhilipSchlender\Faker\Generators\Lorem;
use PhilipSchlender\Faker\Generators\LoremInterface;

class LoremTest extends TestCase
{
    protected LoremInterface $lorem;

    protected function setUp(): void
    {
        parent::setUp();

        $this->lorem = new Lorem();
    }

    public function testRandomSentence(): void
    {
        $sentence = $this->lorem->randomSentence();

        $this->assertIsString($sentence);
        $this->assertGreaterThan(0, strlen($sentence));
    }

    public function testRandomText(): void
    {
        $text = $this->lorem->randomText();

        $this->assertIsString($text);
        $this->assertGreaterThan(0, strlen($text));
    }

    public function testRandomWord(): void
    {
        $word = $this->lorem->randomWord();

        $this->assertIsString($word);
        $this->assertGreaterThan(0, strlen($word));
    }
}
