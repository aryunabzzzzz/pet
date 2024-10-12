<?php

namespace App\Patterns\Behavioral\Strategy\Delivery;

class PostDelivery implements DeliveryInterface
{
    private string $order;

    public function __construct(string $order)
    {
        $this->order = $order;
    }

    public function delivery(): string
    {
        return "$this->order has been delivered to post office";
    }
}
