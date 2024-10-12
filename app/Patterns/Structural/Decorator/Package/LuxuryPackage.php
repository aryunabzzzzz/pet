<?php

namespace App\Patterns\Structural\Decorator\Package;

use App\Patterns\Structural\Decorator\PackageDecorator;

class LuxuryPackage extends PackageDecorator
{
    public function pack(): string
    {
        return $this->package->pack() . " with luxury bag";
    }

    public function cost(): int
    {
        return $this->package->cost() + 20;
    }
}
