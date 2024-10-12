<?php

namespace App\Patterns\Behavioral\State\State;

class DontDisturbState implements PhoneStateInterface
{
    public function notification(): string
    {
        return "Никаких уведомлений. Звука нет.";
    }
}
