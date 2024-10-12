<?php

namespace App\Patterns\Behavioral\ChainOfResponsibility;

use App\Patterns\Behavioral\ChainOfResponsibility\Assembly\DiyStrategy;
use App\Patterns\Behavioral\ChainOfResponsibility\Assembly\InstructionStrategy;
use App\Patterns\Behavioral\ChainOfResponsibility\Assembly\MasterStrategy;
use App\Patterns\Behavioral\ChainOfResponsibility\Assembly\VideoStrategy;

class ChainController
{
    public function chain(): string
    {
        $data = [
            'diy' => false,
            'instruction' => true,
            'video' => false,
        ];

        $diyAssemble = new DiyStrategy();
        $instructionAssemble = new InstructionStrategy();
        $videoAssemble = new VideoStrategy();
        $masterAssemble = new MasterStrategy();

        $diyAssemble
            ->setNextStrategy($instructionAssemble)
            ->setNextStrategy($videoAssemble)
            ->setNextStrategy($masterAssemble);

        return $diyAssemble->assemble($data);
    }
}
