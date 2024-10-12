<?php

namespace App\Patterns\Behavioral\ChainOfResponsibility\Assembly;

class InstructionStrategy extends AssemblyStrategy
{
    public function assemble($data): string
    {
        if ($data['instruction']) {
            return "Получилось собрать с инструкцией";
        }

        return parent::assemble($data);
    }
}
