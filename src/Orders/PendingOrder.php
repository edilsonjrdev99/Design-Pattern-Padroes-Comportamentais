<?php

namespace App\Orders;

use App\Enums\OrderStatus;
use App\Interfaces\Order\OrderStateInterface;

class PendingOrder implements OrderStateInterface {
    public function nextOrderState(): OrderStateInterface {
        return new PaidOrder();
    }

    public function getOrderStatus(): string {
        return OrderStatus::PENDING_STATUS->value;
    }
}