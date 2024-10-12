<?php

namespace App\Patterns\Generative\Builder\PizzaBuilder;


class ReceiptBuilder implements PizzaBuilderInterface
{
    private Receipt $receipt;
    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->receipt = new Receipt();
    }

    public function addOlive(): void
    {
        $this->receipt->setStep('add olive');
    }

    public function addCheese(): void
    {
        $this->receipt->setStep('add cheese');
    }

    public function addPepperoni(): void
    {
        $this->receipt->setStep('add pepperoni');
    }

    public function addBacon(): void
    {
        $this->receipt->setStep('add bacon');
    }

    public function addMushrooms(): void
    {
        $this->receipt->setStep('add mushrooms');
    }

    public function getPizza(): array
    {
        return $this->receipt->getReceipt();
    }
}
