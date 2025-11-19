<?php

namespace App\Orders;

use App\Budgets\Budget;
use App\Interfaces\Order\OrderStateInterface;
use App\Orders\CreatedOrder;

class Order {
    private OrderStateInterface $state;
    public float $value;
    public int $quantity;
    public string $name;

    public function __construct(Budget $budget) {
        $this->state    = new CreatedOrder();
        $this->value    = $budget->value;
        $this->quantity = $budget->quantity;
        $this->name     = $budget->name;
    }

    /**
     * Responsável por definir o próximo estado do Status -> próxima instância de uma Order
     * @return OrderStateInterface - Instância de estado do pedido
     */
    public function nextState(): OrderStateInterface {
        $this->state = $this->state->nextOrderState();
        return $this->state;
    }

    public function getStatus(): string {
        return $this->state->getOrderStatus();
    }
}