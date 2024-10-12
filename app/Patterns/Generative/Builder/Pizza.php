<?php

namespace App\Patterns\Generative\Builder;

class Pizza
{
    private array $ingredients = [];

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function setIngredients($ingredients): self
    {
        $this->ingredients[] = $ingredients;
        return $this;
    }
}
