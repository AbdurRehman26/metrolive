<?php

namespace App\Data\Contracts;

interface ReaderInterface
{
    public function read(string $input): OfferCollectionInterface;
}
