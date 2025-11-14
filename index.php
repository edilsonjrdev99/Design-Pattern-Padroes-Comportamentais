<?php

use App\Budget;
use App\TaxCalculator;

use App\Enums\TaxType;
use App\Tax\TaxICMS;

require __DIR__ . '/vendor/autoload.php';

echo 'Calculadora de impostos' . PHP_EOL;

$taxICMSCalculator = new TaxCalculator();
$taxICMS = new TaxICMS();
$budget = new Budget(100);
$taxValue = $taxICMSCalculator->calculate($budget, $taxICMS);

echo "O valor do imposto de $budget->value = " . $taxValue . PHP_EOL;