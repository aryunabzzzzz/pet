<?php

namespace App\Patterns\Structural\Proxy;

class Book implements BookInterface
{
    private string $title;
    private string $information;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->loadInformation();
    }

    public function getInfo(): string
    {
        return $this->title . ' - ' . $this->information;
    }

    private function loadInformation(): void
    {
        $this->information = 'Огромная гора информации по книге';
    }
}
