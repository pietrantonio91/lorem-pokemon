<?php

class Lorem
{
    public $words = [];

    public function __construct(array $words)
    {
        $this->words = $words;
    }

    public function words(int $quantity = 1)
    {
        return $this->output($this->getWords($quantity));
    }

    public function paragraphs(int $quantity = 1)
    {
        return $this->output($this->getParagraphs($quantity));
    }

    public function sentences(int $quantity = 1)
    {
        return $this->output($this->getSentences($quantity));
    }

    public function getParagraphs(int $quantity = 1)
    {
        $output = '';
        for ($i=0; $i < $quantity; $i++) { 
            $output .= '<p>';
            $output .= $this->getSentences(rand(8, 18));
            $output .= '</p>';
        }
        return $output;
    }

    protected function getSentences(int $quantity = 1)
    {
        $output = '';
        for ($i=0; $i < $quantity; $i++) { 
            $output .= ucfirst($this->getWords(rand(3, 10)));
            $output .= $this->getPunctuation();
            $output .= '. ';
        }
        return $output;
    }

    protected function getPunctuation()
    {
        $output = '';
        if (30 > rand(1, 100)) {
            $output .= ', '.$this->getWords(rand(3, 10));
        }
        if (10 > rand(1, 100)) {
            $output .= ': '.$this->getWords(rand(3, 7));
        }
        return $output;
    }

    protected function getWord()
    {
        shuffle($this->words);
        return $this->words[0];
    }

    protected function getWords(int $quantity = 1, int $count = 0, string $last = '')
    {
        $output = '';
        while ($count < $quantity) {
            $word = $this->getWord();
            if ($word != $last) {
                $output .= $word;
                $last = $word;
                $count++;
                if($quantity != $count) $output .= ' ';
            }
        }

        return $output;
    }

    protected function output($output)
    {
        return ucfirst($output);
    }
}