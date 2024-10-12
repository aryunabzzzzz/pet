<?php

namespace App\Patterns\Generative\Builder;

use App\Patterns\Generative\Builder\PizzaBuilder\PizzaBuilder;
use App\Patterns\Generative\Builder\PizzaBuilder\ReceiptBuilder;

class BuilderController
{
    public function getPizza(): void
    {
        $cook = new Cook();
        $pizza = new PizzaBuilder();
        $receipt = new ReceiptBuilder();

        $cook->setBuilder($pizza);
        print_r($cook->cookVeganPizza());
        $cook->setBuilder($receipt);
        print_r($cook->cookVeganPizza());
    }
}
