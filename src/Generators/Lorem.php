<?php

namespace PhilipSchlender\Faker\Generators;

class Lorem implements LoremInterface
{
    /**
     * @var array<int,string>
     */
    protected array $sentences;

    protected string $text;

    /**
     * @var array<int,string>
     */
    protected array $words;

    public function __construct()
    {
        $this->sentences = $this->getSentences();
        $this->text = $this->getText();
        $this->words = $this->getWords();
    }

    public function randomSentence(): string
    {
        $index = mt_rand(0, count($this->sentences) - 1);

        return $this->sentences[$index];
    }

    public function randomText(): string
    {
        return $this->text;
    }

    public function randomWord(): string
    {
        $index = mt_rand(0, count($this->words) - 1);

        return $this->words[$index];
    }

    /**
     * @return array<int,string>
     */
    protected function getSentences(): array
    {
        $text = $this->getText();

        $parts = explode('.', $text);

        $sentences = [];

        foreach ($parts as $sentence) {
            $sentence = trim($sentence);

            if ('' === $sentence) {
                continue;
            }

            $sentence = sprintf('%s.', $sentence);

            $sentences[] = $sentence;
        }

        return $sentences;
    }

    protected function getText(): string
    {
        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
    }

    /**
     * @return array<int,string>
     */
    protected function getWords(): array
    {
        $text = $this->getText();

        $parts = explode(' ', $text);

        $words = [];

        foreach ($parts as $word) {
            $word = trim($word);

            if ('' === $word) {
                continue;
            }

            $word = strtolower($word);

            $word = preg_replace('/[^a-z]/', '', $word);

            if (!is_string($word)) {
                continue;
            }

            $words[] = $word;
        }

        $words = array_unique($words);

        sort($words, SORT_NATURAL);

        return $words;
    }
}
