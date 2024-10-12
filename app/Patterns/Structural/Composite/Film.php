<?php

namespace App\Patterns\Structural\Composite;

class Film implements FilmsInterface
{
    private string $title;
    private string $year;

    public function __construct(string $title, string $year)
    {
        $this->title = $title;
        $this->year = $year;
    }

    public function getTitle(): string
    {
        return $this->title . " - " . $this->year;
    }
}
