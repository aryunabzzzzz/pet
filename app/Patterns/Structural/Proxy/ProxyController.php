<?php

namespace App\Patterns\Structural\Proxy;

class ProxyController
{
    //xdebug
    public function proxy(): array
    {
        $user = true;
        $book1 = new BookProxy('title1', $user);
        $book2 = new BookProxy('title2');

        $res = [];
        $res[] = $book1->getInfo();
        $res[] = $book2->getInfo();
        $res[] = $book1->getInfo();

        return $res;
    }
}
