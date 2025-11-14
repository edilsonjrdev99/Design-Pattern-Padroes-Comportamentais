<?php 

namespace App\Discounts;

use App\Budgets\Budget;
use App\Discounts\Discount;

class DiscountNotApplied extends Discount {
    public function __construct() {
        parent::__construct(null);
    }

    public function calculate(Budget $budget): float {
        return 0;
    }
}