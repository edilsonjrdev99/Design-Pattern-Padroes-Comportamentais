<?php

use App\Budgets\Budget;
use App\Discounts\DiscountCalculator;

require __DIR__ . '/vendor/autoload.php';

echo 'Calculando desconto dos orçamentos' . PHP_EOL;

$budget = new Budget(500, 6, 'Junin');
$discount = new DiscountCalculator();

echo 'Valor do desconto é de = R$' . $discount->calculate($budget) . "\n";