<?php

namespace App\Patterns\Structural\Composite;

class FilmCategory implements FilmsInterface
{
    private string $name;
    private array $films;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addFilms(FilmsInterface $films): void
    {
        $this->films[] = $films;
    }

    public function getTitle(): array
    {
        $result [] = $this->name;
        foreach ($this->films as $film) {
            $result[] = $film->getTitle();
        }

        return $result;
    }
}
