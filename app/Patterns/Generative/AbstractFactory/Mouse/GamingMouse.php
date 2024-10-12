<?php

namespace App\Patterns\Generative\AbstractFactory\Mouse;

class GamingMouse implements MouseInterface
{
    public function click(): string
    {
        return 'quick click';
    }
}
