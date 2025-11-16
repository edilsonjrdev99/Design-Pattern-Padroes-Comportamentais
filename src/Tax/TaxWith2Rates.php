<?php 

namespace App\Tax;

use App\Budgets\Budget;
use App\Interfaces\Tax\TaxInterface;

abstract class TaxWith2Rates implements TaxInterface {
    /**
     * Responsável por fazer o cálculo de imposto quando existir dois calculos de taxas possíveis
     * @param Budget $budget - Instância de um orçamento
     * @return float valor do imposto
     */
    public function calculate(Budget $budget): float {
        if ($this->applyMaxTaxRate($budget))
            return $this->calculateMaxTaxRate($budget);

        return $this->calculateMinTaxRate($budget);
    }

    /**
     * Responsável por retornar o valor máximo do imposto
     * @param Budget $budget - Instância do orçamento
     * @return float - Valor do imposto
     */
    abstract protected function calculateMaxTaxRate(Budget $budget): float;

    /**
     * Responsável por retornar o valor mínimo do imposto
     * @param Budget $budget - Instância do orçamento
     * @return float - Valor do imposto
     */
    abstract protected function calculateMinTaxRate(Budget $budget): float;

    /**
     * Responsável por verificar qual tipo de imposto será aplicado, o máx ou min
     * @param Budget $budget - Instância do orçamento
     * @return bool - Indica qual desconto vai aplicar
     */
    abstract protected function applyMaxTaxRate(Budget $budget): bool;
}