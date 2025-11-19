<?php 

namespace App\Invoices;

use App\Orders\Order;

class Invoice {
    public function __construct(
        private Order $orderState
    ) {}

    public function getOrder(): Order {
        return $this->orderState;
    }
}