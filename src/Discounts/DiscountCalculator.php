<?php 

namespace App\Discounts;

use App\Budgets\Budget;
use App\Discounts\DiscountForAmountsOver500;
use App\Discounts\DiscountForQuantityGreater5;
use App\Discounts\DiscountNotApplied;

class DiscountCalculator {
    public function calculate(Budget $budget): float {
        $discountPriority = new DiscountForAmountsOver500(
            new DiscountForQuantityGreater5(
                new DiscountNotApplied()
            )
        );

        return $discountPriority->calculate($budget);
    }
}