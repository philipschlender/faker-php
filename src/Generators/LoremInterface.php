<?php

namespace Faker\Generators;

interface LoremInterface
{
    public function randomSentence(): string;

    public function randomText(): string;

    public function randomWord(): string;
}
