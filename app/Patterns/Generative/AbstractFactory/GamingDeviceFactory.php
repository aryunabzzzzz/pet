<?php

namespace App\Patterns\Generative\AbstractFactory;

use App\Patterns\Generative\AbstractFactory\Keyboard\GamingKeyboard;
use App\Patterns\Generative\AbstractFactory\Keyboard\KeyboardInterface;
use App\Patterns\Generative\AbstractFactory\Mouse\GamingMouse;
use App\Patterns\Generative\AbstractFactory\Mouse\MouseInterface;

class GamingDeviceFactory implements DeviceFactoryInterface
{
    public function createKeyboard(): KeyboardInterface
    {
        return new GamingKeyboard();
    }

    public function createMouse(): MouseInterface
    {
        return new GamingMouse();
    }
}
