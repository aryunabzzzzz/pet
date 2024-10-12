<?php

namespace App\Patterns\Behavioral\State\State;

class NoSoundState implements PhoneStateInterface
{
    public function notification(): string
    {
        return "Уведомления, но без звука";
    }
}
