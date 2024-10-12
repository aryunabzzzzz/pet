<?php

namespace App\Patterns\Generative\Builder\PizzaBuilder;

use App\Patterns\Generative\Builder\Pizza;

class PizzaBuilder implements PizzaBuilderInterface
{
    private Pizza $pizza;
    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->pizza = new Pizza();
    }

    public function addOlive(): void
    {
        $this->pizza->setIngredients('olive');
    }

    public function addCheese(): void
    {
        $this->pizza->setIngredients('cheese');
    }

    public function addPepperoni(): void
    {
        $this->pizza->setIngredients('pepperoni');
    }

    public function addBacon(): void
    {
        $this->pizza->setIngredients('bacon');
    }

    public function addMushrooms(): void
    {
        $this->pizza->setIngredients('mushrooms');
    }

    public function getPizza(): array
    {
       return $this->pizza->getIngredients();
    }
}
