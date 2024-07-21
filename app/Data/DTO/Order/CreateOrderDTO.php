<?php

namespace App\Data\DTO\Order;

class CreateOrderDTO
{
    /**
     * @param int $customerId
     * @param string $address
     * @param string|null $comment
     */
    public function __construct(
        public readonly int $customerId,
        public readonly string $address,
        public readonly string|null $comment
    )
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'customer_id' => $this->customerId,
            'address' => $this->address,
            'comment' => $this->comment
        ];
    }
}
