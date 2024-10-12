<?php

namespace App\Patterns\Generative\AbstractFactory\Keyboard;

class GamingKeyboard implements KeyboardInterface
{
    public function print(): string
    {
        return 'Gaming keyboard';
    }
}
