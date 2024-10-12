<?php

namespace App\Patterns\Structural\Decorator\Package;

interface PackageInterface
{
    public function pack(): string;
    public function cost(): int;
}
