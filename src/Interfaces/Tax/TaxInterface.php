<?php 

namespace App\Interfaces\Tax;

use App\Budgets\Budget;

interface TaxInterface {
    public function calculate(Budget $budget): float;
}