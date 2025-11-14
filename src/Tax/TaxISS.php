<?php 

namespace App\Tax;

use App\Budgets\Budget;
use App\Enums\TaxValue;
use App\Interfaces\Tax\TaxInterface;

class TaxISS implements TaxInterface {
    /**
     * Responsável por retornar o valor do imposto de ISS
     * @param Budget $budget - Orçamento
     * @return float - Valor do imposto de Iss
     */
    public function calculate(Budget $budget): float {
        return $budget->value * TaxValue::ISS_VALUE_FIC->toFloat();
    }
}