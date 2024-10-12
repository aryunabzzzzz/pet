<?php

namespace App\Patterns\Behavioral\Strategy;

use App\Patterns\Behavioral\Strategy\Delivery\CdekDelivery;

class StrategyController
{
    public function strategy(): string
    {
        $order = 'Book';

        $delivery = new PickUpPoint(new CdekDelivery($order));
//        $delivery->setDelivery(new PostDelivery($order));
        return $delivery->orderDelivery();
    }
}
