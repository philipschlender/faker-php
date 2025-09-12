<?php

namespace Tests;

use Faker\Generators\DataTypeGenerator;
use Faker\Generators\LoremGenerator;
use Faker\Generators\LoremGeneratorInterface;

class LoremGeneratorTest extends TestCase
{
    protected LoremGeneratorInterface $loremGenerator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loremGenerator = new LoremGenerator(new DataTypeGenerator());
    }

    public function testRandomSentence(): void
    {
        $sentence = $this->loremGenerator->randomSentence();

        $this->assertGreaterThan(0, strlen($sentence));
    }

    public function testRandomText(): void
    {
        $text = $this->loremGenerator->randomText();

        $this->assertGreaterThan(0, strlen($text));
    }

    public function testRandomWord(): void
    {
        $word = $this->loremGenerator->randomWord();

        $this->assertGreaterThan(0, strlen($word));
    }
}
