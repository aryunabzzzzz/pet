<?php

namespace App\Patterns\Behavioral\ChainOfResponsibility\Assembly;

class MasterStrategy extends AssemblyStrategy
{
    public function assemble($data): string
    {
        return "Мастер собрал, но мы тоже молодцы";
    }
}
