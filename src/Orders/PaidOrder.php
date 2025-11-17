<?php

namespace App\Orders;

use App\Enums\OrderStatus;
use App\Interfaces\Order\OrderStateInterface;

class PaidOrder implements OrderStateInterface {
    public function nextOrderState(): OrderStateInterface {
        return new DeliveryOrder();
    }

    public function getOrderStatus(): string {
        return OrderStatus::PAID_STATUS->value;
    }
}