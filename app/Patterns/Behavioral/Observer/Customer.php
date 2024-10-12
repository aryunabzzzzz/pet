<?php

namespace App\Patterns\Behavioral\Observer;

class Customer implements \SplObserver
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function update(\SplSubject $subject): void
    {
        echo $this->name. " get promocode ".$subject->getPromo().PHP_EOL;
    }
}
