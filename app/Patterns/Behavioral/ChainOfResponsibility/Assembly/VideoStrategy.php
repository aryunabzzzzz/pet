<?php

namespace App\Patterns\Behavioral\ChainOfResponsibility\Assembly;

class VideoStrategy extends AssemblyStrategy
{
    public function assemble($data): string
    {
        if ($data['video']) {
            return "Получилось собрать по видео";
        }

        return parent::assemble($data);
    }
}
