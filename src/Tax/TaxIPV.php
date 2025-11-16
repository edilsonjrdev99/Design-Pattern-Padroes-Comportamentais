<?php

namespace App\Tax;

use App\Budgets\Budget;
use App\Tax\TaxWhith2Rates;


class TaxIPV extends TaxWith2Rates {
    protected function calculateMaxTaxRate(Budget $budget): float {
        return $budget->value * 0.20;
    }

    protected function calculateMinTaxRate(Budget $budget): float {
        return $budget->value * 0.08;
    }

    protected function applyMaxTaxRate(Budget $budget): bool {
        return $budget->value > 600;
    }
}