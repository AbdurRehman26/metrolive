<?php

namespace App\Data;

use App\Data\Contracts\OfferCollectionInterface;
use App\Data\Contracts\OfferInterface;
use App\Data\Iterators\AscendingOrderIterator;
use Iterator;

class OfferCollection implements OfferCollectionInterface
{
    /**
     * @var array
     */
    private $collection = [];

    public function add(OfferInterface $offer)
    {
        $this->collection[] = $offer;
    }

    public function get(int $index): OfferInterface
    {
        return $this->collection[$index];
        // TODO: Implement get() method.
    }

    public function getItems(): array
    {
        return $this->collection;
    }

    public function getOfferByRange(int $min, int $max)
    {
        foreach ($this->getIterator() as $item){
            dd($item);
        }
    }

    public function getIterator(): Iterator
    {
        return new AscendingOrderIterator($this);
    }
}
