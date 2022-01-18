<?php

namespace App\Data;

use App\Data\Contracts\OfferCollectionInterface;
use App\Data\Contracts\OfferInterface;
use App\Data\Contracts\ReaderInterface;
use App\Data\DTO\Offer;

class JsonReader implements ReaderInterface
{
    public function read(string $input): OfferCollectionInterface
    {
        $offerCollection = new OfferCollection();
        foreach (json_decode($input, true) as  $offer){
            $offerCollection->add($this->parseToOfferObject($offer));
        }
        return $offerCollection;
    }

    protected function parseToOfferObject(array $offerData): OfferInterface
    {
        $offer = new Offer();
        $offer->setOfferId($offerData['offerId']);
        $offer->setPrice($offerData['price']);
        $offer->setVendorId($offerData['vendorId']);
        $offer->setProductTitle($offerData['productTitle']);
        return $offer;
    }
}
