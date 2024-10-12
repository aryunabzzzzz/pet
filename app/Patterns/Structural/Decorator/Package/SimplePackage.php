<?php

namespace App\Patterns\Structural\Decorator\Package;

class SimplePackage implements PackageInterface
{
    public function pack(): string
    {
        return 'Simple package';
    }

    public function cost(): int
    {
        return 2;
    }
}
