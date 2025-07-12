<?php

namespace Faker\Generators;

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

    public function __construct(
        protected CoreInterface $core,
    ) {
        $this->sentences = $this->getSentences();
        $this->text = $this->getText();
        $this->words = $this->getWords();
    }

    public function randomSentence(): string
    {
        $index = $this->core->randomInteger(0, count($this->sentences) - 1);

        return $this->sentences[$index];
    }

    public function randomText(): string
    {
        return $this->text;
    }

    public function randomWord(): string
    {
        $index = $this->core->randomInteger(0, count($this->words) - 1);

        return $this->words[$index];
    }

    /**
     * @return array<int,string>
     */
    protected function getSentences(): array
    {
        return [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        ];
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
        return [
            'ad',
            'adipiscing',
            'aliqua',
            'aliquip',
            'amet',
            'anim',
            'aute',
            'cillum',
            'commodo',
            'consectetur',
            'consequat',
            'culpa',
            'cupidatat',
            'deserunt',
            'do',
            'dolor',
            'dolore',
            'duis',
            'ea',
            'eiusmod',
            'elit',
            'enim',
            'esse',
            'est',
            'et',
            'eu',
            'ex',
            'excepteur',
            'exercitation',
            'fugiat',
            'id',
            'in',
            'incididunt',
            'ipsum',
            'irure',
            'labore',
            'laboris',
            'laborum',
            'lorem',
            'magna',
            'minim',
            'mollit',
            'nisi',
            'non',
            'nostrud',
            'nulla',
            'occaecat',
            'officia',
            'pariatur',
            'proident',
            'qui',
            'quis',
            'reprehenderit',
            'sed',
            'sint',
            'sit',
            'sunt',
            'tempor',
            'ullamco',
            'ut',
            'velit',
            'veniam',
            'voluptate',
        ];
    }
}
