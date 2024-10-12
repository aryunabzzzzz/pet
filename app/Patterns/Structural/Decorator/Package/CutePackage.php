<?php

namespace App\Patterns\Structural\Decorator\Package;

use App\Patterns\Structural\Decorator\PackageDecorator;

class CutePackage extends PackageDecorator
{
    public function pack(): string
    {
        return $this->package->pack() . " with cute bow";
    }

    public function cost(): int
    {
        return $this->package->cost() + 10;
    }
}
