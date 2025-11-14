<?php 

namespace App\Interfaces\Tax;

use App\Budget;

interface TaxInterface {
    public function calculate(Budget $budget): float;
}