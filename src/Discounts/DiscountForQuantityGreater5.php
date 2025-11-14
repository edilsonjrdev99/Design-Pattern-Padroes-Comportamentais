<?php 

namespace App\Discounts;

use App\Budgets\Budget;
use App\Discounts\Discount;

class DiscountForQuantityGreater5 extends Discount {
    /**
     * Responsável por calcular o valor de desconto para quantidade maior que 5 (5%)
     * @param Budget $budget - Instância de um orçamento
     * @return float - Valor de desconto
     */
    public function calculate(Budget $budget): float {
        if ($budget->quantity > 5)
            return $budget->value * 0.05;

        return $this->nextDiscount->calculate($budget);
    }
}