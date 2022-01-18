<?php

namespace App\Data\Iterators;

use JetBrains\PhpStorm\Internal\TentativeType;

class AscendingOrderIterator implements \Iterator
{
    private $collection, $postion, $reverse;

    public function __construct($collection, $reverse = false)
    {
        $this->collection = $collection;
        $this->reverse = $reverse;
    }

    public function current(): mixed
    {
        return $this->collection->getItems()[$this->postion];
    }

    public function next(): void
    {
        $this->postion = $this->postion + ( $this->reverse ? -1 : 1 );
    }

    public function key(): mixed
    {
        return $this->postion;
    }

    public function valid(): bool
    {
        return isset($this->collection->getItems()[$this->postion]);
    }

    public function rewind(): void
    {
        $this->postion = $this->reverse ? count($this->collection->getItems()[$this->postion]) - 1 : 0;
    }
}
