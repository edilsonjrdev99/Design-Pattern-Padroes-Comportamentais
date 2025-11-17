<?php 

namespace App\Interfaces\Order;

interface OrderStateInterface {
    /**
     * Responsável por definir qual é o próximo estado
     * @return OrderStateInterface - Instância de uma classe de estado do pedido
     */
    public function nextOrderState(): OrderStateInterface;

    /**
     * Responsável por retornar o status atual do pedido
     * @return string - Status atual do pedido
     */
    public function getOrderStatus(): string;
}