<?php

namespace App\Orders;

use App\Enums\OrderStatus;
use App\Interfaces\Order\OrderStateInterface;

class CreatedOrder implements OrderStateInterface {
    public function nextOrderState(): OrderStateInterface  {
        return new PendingOrder();
    }

    public function getOrderStatus(): string {
        return OrderStatus::CREATED_STATUS->value;
    }
}