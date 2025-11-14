<?php 

namespace App\Discounts;

use App\Budgets\Budget;

abstract class Discount {
    protected ?Discount $nextDiscount;

    public function __construct(?Discount $discount = null) {
        $this->nextDiscount = $discount;
    }

    abstract public function calculate(Budget $budget): float;
}