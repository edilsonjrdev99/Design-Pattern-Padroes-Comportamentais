<?php 

namespace App\Budgets;

class Budget {
    public function __construct(public float $value, public int $quantity) {}
}