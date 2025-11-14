<?php

use App\Budgets\Budget;
use App\Tax\TaxCalculator;

use App\Tax\TaxICMS;

require __DIR__ . '/vendor/autoload.php';

echo 'Calculadora de impostos' . PHP_EOL;

$taxICMSCalculator = new TaxCalculator();
$taxICMS = new TaxICMS();
$budget = new Budget(100, 1);
$taxValue = $taxICMSCalculator->calculate($budget, $taxICMS);

echo "O valor do imposto de R$$budget->value = R$" . $taxValue . PHP_EOL;