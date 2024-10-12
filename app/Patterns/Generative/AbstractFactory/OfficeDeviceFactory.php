<?php

namespace App\Patterns\Generative\AbstractFactory;

use App\Patterns\Generative\AbstractFactory\Keyboard\KeyboardInterface;
use App\Patterns\Generative\AbstractFactory\Keyboard\OfficeKeyboard;
use App\Patterns\Generative\AbstractFactory\Mouse\MouseInterface;
use App\Patterns\Generative\AbstractFactory\Mouse\OfficeMouse;

class OfficeDeviceFactory implements DeviceFactoryInterface
{
    public function createKeyboard(): KeyboardInterface
    {
        return new OfficeKeyboard();
    }

    public function createMouse(): MouseInterface
    {
        return new OfficeMouse();
    }
}
