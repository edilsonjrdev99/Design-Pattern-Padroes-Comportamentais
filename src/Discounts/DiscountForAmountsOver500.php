<?php

namespace App\Discounts;

use App\Budgets\Budget;
use App\Discounts\Discount;

class DiscountForAmountsOver500 extends Discount {
    /**
     * Responsável por calcular o valor de desconto para valor maior que 500 (10%)
     * @param Budget $budget - Instância de um orçamento
     * @return float - Valor do desconto
     */
    public function calculate(Budget $budget): float {
        if ($budget->value > 500)
            return $budget->value * 0.1;

        return $this->nextDiscount->calculate($budget);
    }
}