<?php

namespace App\Patterns\Behavioral\State;

use App\Patterns\Behavioral\State\State\PhoneStateInterface;

class Phone
{
    private PhoneStateInterface $phoneState;

    public function __construct(PhoneStateInterface $phoneState)
    {
        $this->phoneState = $phoneState;
    }

    public function setState(PhoneStateInterface $phoneState): void
    {
        $this->phoneState = $phoneState;
    }

    public function getNotification(): string
    {
        return $this->phoneState->notification();
    }
}
