<?php

namespace App\Patterns\Generative\Builder\PizzaBuilder;

interface PizzaBuilderInterface
{
    public function addOlive(): void;
    public function addCheese(): void;
    public function addPepperoni(): void;
    public function addBacon(): void;
    public function addMushrooms(): void;
    public function getPizza(): array;
}
