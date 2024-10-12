<?php

namespace App\Patterns\Behavioral\State;

use App\Patterns\Behavioral\State\State\DontDisturbState;
use App\Patterns\Behavioral\State\State\NoSoundState;

class StateController
{
    public function state(): string
    {
        $phone = new Phone(new DontDisturbState());
        $phone->setState(new NoSoundState());

        return $phone->getNotification();
    }

}
