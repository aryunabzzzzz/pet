<?php

namespace App\Patterns\Behavioral\Observer;

class ObserverController
{
    public function observe(): void
    {
        $delivery = new Delivery('panda');

        $customer1 = new Customer('John Doe');
        $customer2 = new Customer('Jane Doe');
        $customer3 = new Customer('Jake Doe');

        $delivery->attach($customer1);
        $delivery->attach($customer2);
        $delivery->attach($customer3);

        $delivery->setPromo('123456');

        $delivery->detach($customer3);

        $delivery->setPromo('QWERTY');
    }
}
