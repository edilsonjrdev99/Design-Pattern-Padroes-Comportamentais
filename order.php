<?php

require __DIR__ . '/vendor/autoload.php';

use App\Budgets\Budget;
use App\Discounts\DiscountCalculator;
use App\Tax\TaxICMS;
use App\Orders\Order;

echo 'Lidando com pedido' . PHP_EOL;

$budget        = new Budget(100, 6, 'Junin');
$taxICMS       = new TaxICMS();
$taxValue      = $taxICMS->calculate($budget); // Valor do imposto de ICMS
$discount      = new DiscountCalculator();
$discountValue = $discount->calculate($budget); // Valor do desconto
$order         = new Order($budget);
$status        = $order->getStatus(); // Status inicial do pedido

echo "O valor do orçamento inicial é: $budget->value" . PHP_EOL;
echo "O valor do imposto sobre esse orçamento é: $taxValue" . PHP_EOL;
echo "O valor do desconto para esse orçamento é: $discountValue" . PHP_EOL;
echo "Pedido criado. Valor do pedido é $order->value, quantidade é $order->quantity e o status inicial é " . $status . PHP_EOL;

// Pendente
$order->nextState();
echo "O pedido está aguardando pagamento, status atual - " . $order->getStatus() . PHP_EOL;

// Pago
$order->nextState();
echo "O pedido foi pago, status atual - " . $order->getStatus() . PHP_EOL;

// Enviado
$order->nextState();
echo "O pedido foi enviado, status atual - " . $order->getStatus() . PHP_EOL;

// Finalizado
$order->nextState();
echo "O pedido foi finalizado, status atual - " . $order->getStatus() . PHP_EOL;