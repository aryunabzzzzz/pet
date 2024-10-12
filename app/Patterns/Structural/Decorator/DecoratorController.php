<?php

namespace App\Patterns\Structural\Decorator;

use App\Patterns\Structural\Decorator\Package\CutePackage;
use App\Patterns\Structural\Decorator\Package\LuxuryPackage;
use App\Patterns\Structural\Decorator\Package\SimplePackage;

class DecoratorController
{
    public function decorate(): string
    {
        $package = new SimplePackage();
        $package = new LuxuryPackage($package);
        $package = new CutePackage($package);

        return "Package: {$package->pack()}. Cost: {$package->cost()}";
    }
}
