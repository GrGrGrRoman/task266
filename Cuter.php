<?php

class Cuter implements Iterator
{
    private $position = 0;
    private $array = [];

    public function __construct($arr)
    {
        $this->array = $arr;
    }

    #[\ReturnTypeWillChange]
    public function current()
    {
        return $this->array[$this->position];
    }

    #[\ReturnTypeWillChange]
    public function key()
    {
        return $this->position;
    }

    public function next(): void
    {
        do {
            ++$this->position;
        } while (($this->valid()) && ($this->checkTags($this->current())));
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->array[$this->position]);
    }

    private function checkTags($str): bool
    {
        if ((strpos($str, '<title>') == true) || (strpos($str, '</title>') == true) || (strpos($str, '<meta name="keywords"') == true) || (strpos($str, '<meta name="description"') == true)) {
            return true;
        }
        return false;
    }
}
