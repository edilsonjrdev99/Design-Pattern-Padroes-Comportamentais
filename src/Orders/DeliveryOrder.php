<?php

namespace App\Orders;

use App\Enums\OrderStatus;
use App\Interfaces\Order\OrderStateInterface;

class DeliveryOrder implements OrderStateInterface {
    public function nextOrderState(): OrderStateInterface {
        return new FinishOrder();
    }

    public function getOrderStatus(): string {
        return OrderStatus::DELIVERY_STATUS->value;
    }
}