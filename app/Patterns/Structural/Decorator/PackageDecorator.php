<?php

namespace App\Patterns\Structural\Decorator;

use App\Patterns\Structural\Decorator\Package\PackageInterface;

abstract class PackageDecorator implements PackageInterface
{
    protected PackageInterface $package;

    public function __construct(PackageInterface $package)
    {
        $this->package = $package;
    }
}
