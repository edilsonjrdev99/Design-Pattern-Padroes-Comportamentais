<?php

require __DIR__ . '/vendor/autoload.php';

use App\Budgets\Budget;
use App\Invoices\Invoice;
use App\Invoices\InvoiceUseCase;
use App\Orders\Order;

echo 'Cadastro de cliente usando conceito de command e command handler' . PHP_EOL;

$budget = new Budget(100, 2, "Ana");
$order = new Order($budget);

// Simula pedido sendo alterado para pago
$order->nextState();
// $order->nextState();

$invoice = new Invoice($order);
$createInvoice = new InvoiceUseCase($invoice);

echo 'Orçamento' . PHP_EOL;
print_r($budget); echo PHP_EOL;

echo 'Status do pedido = ' .$order->getStatus(). PHP_EOL;

echo 'Gerando nota fiscal' . PHP_EOL;

print_r($createInvoice->execute());