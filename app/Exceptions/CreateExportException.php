<?php

namespace App\Exceptions;

use Exception;

class CreateExportException extends Exception
{
    public function __construct(string $message = "Ошибка при экспорте данных", int $code = 0)
    {
        parent::__construct($message, $code);
    }
}
