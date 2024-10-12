<?php

namespace App\Patterns\Generative\Builder\PizzaBuilder;

class Receipt
{
    private array $steps = [];

    public function getReceipt(): array
    {
        return $this->steps;
    }

    public function setStep($steps): self
    {
        $this->steps[] = $steps;
        return $this;
    }
}
