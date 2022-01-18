<?php

namespace App\Data\DTO;

use App\Data\Contracts\OfferInterface;

class Offer implements OfferInterface
{
    private $offerId, $productTitle, $vendorId, $price;

    /**
     * @return mixed
     */
    public function getOfferId()
    {
        return $this->offerId;
    }

    /**
     * @param mixed $offerId
     */
    public function setOfferId($offerId): void
    {
        $this->offerId = $offerId;
    }

    /**
     * @return mixed
     */
    public function getProductTitle()
    {
        return $this->productTitle;
    }

    /**
     * @param mixed $productTitle
     */
    public function setProductTitle($productTitle): void
    {
        $this->productTitle = $productTitle;
    }

    /**
     * @return mixed
     */
    public function getVendorId()
    {
        return $this->vendorId;
    }

    /**
     * @param mixed $vendorId
     */
    public function setVendorId($vendorId): void
    {
        $this->vendorId = $vendorId;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function priceBetween(int $min, int $max): OfferInterface|bool
    {
        return $this->price < $max && $this->price > $min ? $this : false;
    }
}
