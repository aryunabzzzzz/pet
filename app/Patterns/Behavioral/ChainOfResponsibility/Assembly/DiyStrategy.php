<?php

namespace App\Patterns\Behavioral\ChainOfResponsibility\Assembly;

class DiyStrategy extends AssemblyStrategy
{
    public function assemble($data): string
    {
        if ($data['diy']) {
            return "Получилось собрать без инструкции";
        }

        return parent::assemble($data);
    }
}
