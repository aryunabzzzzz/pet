<?php

namespace App\Patterns\Behavioral\ChainOfResponsibility\Assembly;

abstract class AssemblyStrategy
{
    protected AssemblyStrategy $nextStrategy;

    public function setNextStrategy(AssemblyStrategy $strategy): AssemblyStrategy
    {
        $this->nextStrategy = $strategy;
        return $strategy;
    }

    public function assemble($data): string
    {
        return $this->nextStrategy->assemble($data);
    }
}
