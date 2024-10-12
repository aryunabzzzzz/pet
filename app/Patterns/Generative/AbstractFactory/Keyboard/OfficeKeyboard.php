<?php

namespace App\Patterns\Generative\AbstractFactory\Keyboard;

class OfficeKeyboard implements KeyboardInterface
{
    public function print(): string
    {
        return 'OfficeKeyboard';
    }
}
