<?php

namespace App\Patterns\Behavioral\Observer;

class Delivery implements \SplSubject
{
    private string $name;
    private array $observers = [];
    private string $promocode;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function attach(\SplObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(\SplObserver $observer): void
    {
        foreach ($this->observers as $key => $obs) {
            if ($observer === $obs) {
                unset($this->observers[$key]);
            }
        }
    }

    public function getPromo(): string
    {
        return $this->promocode. " from ". $this->name;
    }

    public function setPromo(string $promocode): void
    {
        $this->promocode = $promocode;
        $this->notify();
    }

    public function notify(): void
    {
        foreach ($this->observers as $obs) {
            $obs->update($this);
        }
    }
}
