<?php

namespace App\Patterns\Generative\Builder;

use App\Patterns\Generative\Builder\PizzaBuilder\PizzaBuilderInterface;

class Cook
{
    private PizzaBuilderInterface $pizzaBuilder;

    public function setBuilder(PizzaBuilderInterface $pizzaBuilder): static
    {
        $this->pizzaBuilder = $pizzaBuilder;
        return $this;
    }

    public function getBuilder(): PizzaBuilderInterface
    {
        return $this->pizzaBuilder;
    }

    public function cookPizza(): array
    {
        $builder = $this->getBuilder();

        $builder->addOlive();
        $builder->addBacon();
        $builder->addCheese();
        $builder->addMushrooms();
        $builder->addPepperoni();

        return $builder->getPizza();
    }

    public function cookVeganPizza(): array
    {
        $builder = $this->getBuilder();

        $builder->addOlive();
        $builder->addCheese();
        $builder->addMushrooms();
        $builder->addCheese();
        $builder->addMushrooms();

        return $builder->getPizza();
    }
}
