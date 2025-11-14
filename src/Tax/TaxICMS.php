<?php 

namespace App\Tax;

use App\Budgets\Budget;
use App\Enums\TaxValue;
use App\Interfaces\Tax\TaxInterface;

class TaxICMS implements TaxInterface {
    /**
     * Responsável por retornar o valor do imposto de ICMS
     * @param Budget $budget - Orçamento
     * @return float - Valor do imposto de ICMS
     */
    public function calculate(Budget $budget): float {
        return $budget->value * TaxValue::ICMS_VALUE_FIC->toFloat();
    }
}