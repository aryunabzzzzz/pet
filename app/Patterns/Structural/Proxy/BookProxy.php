<?php

namespace App\Patterns\Structural\Proxy;

class BookProxy implements BookInterface
{
    private $book;
    private string $title;
    private bool $user;

    public function __construct(string $title, bool $user = false)
    {
        $this->title = $title;
        $this->user = $user;
    }

    public function getInfo(): string
    {
        if(!$this->user){
            return 'Необходимо авторизоваться';
        }
        if ($this->book == null){
            $this->book = new Book($this->title);
        }
        return $this->book->getInfo();
    }
}
