<?php

namespace Faker\Generators;

interface LoremGeneratorInterface
{
    public function randomSentence(): string;

    public function randomText(): string;

    public function randomWord(): string;
}
