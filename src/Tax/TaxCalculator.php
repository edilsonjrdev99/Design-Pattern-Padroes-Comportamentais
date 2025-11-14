<?php

namespace App\Tax;

use App\Budgets\Budget;
use App\Interfaces\Tax\TaxInterface;

class TaxCalculator {
    /**
     * Responsável por calcular a taxa de imposto de ICMS ou ISS fictícias
     * @param Budget $budget instância da classe de orçamento
     * @param TaxInterface $tax - Uma classe que implementa a interface TaxInterface
     * @return float valor do imposto
     */
    public function calculate(Budget $budget, TaxInterface $tax): float {
        return $tax->calculate($budget);
    }
}