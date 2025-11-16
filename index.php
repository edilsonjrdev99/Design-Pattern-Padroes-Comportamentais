<?php

use App\Budgets\Budget;
use App\Tax\TaxCalculator;

use App\Tax\TaxICMS;
use App\Tax\TaxIPV;

require __DIR__ . '/vendor/autoload.php';

echo 'Calculadora de impostos' . PHP_EOL;

$taxICMSCalculator = new TaxCalculator();
$taxICMS = new TaxICMS();
$taxIPV = new TaxIPV();
$budget = new Budget(100, 1);
$taxValue = $taxICMSCalculator->calculate($budget, $taxICMS);
$taxWith2RatesValue = $taxICMSCalculator->calculate($budget, $taxIPV);

echo "O valor do imposto de R$$budget->value = R$" . $taxValue . PHP_EOL;
echo "O valor do imposto com 2 tipos de R$$budget->value = R$" . $taxWith2RatesValue . PHP_EOL;