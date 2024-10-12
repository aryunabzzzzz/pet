<?php

namespace App\Patterns\Generative\AbstractFactory;

use App\Patterns\Generative\AbstractFactory\Keyboard\KeyboardInterface;
use App\Patterns\Generative\AbstractFactory\Mouse\MouseInterface;

interface DeviceFactoryInterface
{
    public function createKeyboard(): KeyboardInterface;
    public function createMouse(): MouseInterface;
}
