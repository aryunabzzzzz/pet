<?php

namespace App\Patterns\Generative\AbstractFactory\Mouse;

class OfficeMouse implements MouseInterface
{
    public function click(): string
    {
        return 'regular click';
    }
}
