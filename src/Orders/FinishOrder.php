<?php

namespace App\Orders;

use App\Enums\OrderStatus;
use App\Interfaces\Order\OrderStateInterface;

class FinishOrder implements OrderStateInterface {
    public function nextOrderState(): OrderStateInterface {
        return $this;
    }

    public function getOrderStatus(): string {
        return OrderStatus::FINISH_STATUS->value;
    }
}