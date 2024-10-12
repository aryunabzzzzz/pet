<?php

namespace App\Patterns\Behavioral\Strategy;

use App\Patterns\Behavioral\Strategy\Delivery\DeliveryInterface;

class PickUpPoint
{
    private DeliveryInterface $delivery;

    public function __construct(DeliveryInterface $delivery)
    {
        $this->delivery = $delivery;
    }

    public function setDelivery(DeliveryInterface $delivery): void
    {
        $this->delivery = $delivery;
    }

    public function orderDelivery(): string
    {
        return $this->delivery->delivery();
    }
}
