<?php

namespace App\Patterns\Generative\AbstractFactory;

class AbstractController
{
    public function showDevices()
    {
        $style = 'gaming';

        switch ($style) {
            case 'gaming':
                $factory = new GamingDeviceFactory();
                break;
            case 'office':
                $factory = new OfficeDeviceFactory();
                break;
            default:
                return response()->json(['error' => 'Invalid style'], 400);
        }

        $keyboard = $factory->createKeyboard();
        $mouse = $factory->createMouse();

        return response()->json([
            'keyboard' => $keyboard->print(),
            'mouse' => $mouse->click(),
        ]);
    }
}
