<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CreateOrderException extends Exception
{
    public function __construct($message = "Ошибка при создании заказа", $code = 0)
    {
        parent::__construct($message, $code);
    }

    /**
     * @return void
     */
    public function report(): void
    {
        Log::channel('daily_order')->error("CreateOrderException: {$this->message}", ['code' => $this->code]);
    }

    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $this->message,
            'code' => $this->code,
        ]);
    }

}
