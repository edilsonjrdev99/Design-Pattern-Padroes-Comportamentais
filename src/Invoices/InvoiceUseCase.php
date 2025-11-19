<?php

namespace App\Invoices;

use App\Interfaces\Command\CommandInterface;
use App\Invoices\Invoice;

class InvoiceUseCase implements CommandInterface {
    public function __construct(private Invoice $invoice) {}

    public function execute() {
        $status = $this->invoice->getOrder()->getStatus();
        if ($status == 'Criado' || $status == 'Pendente') {
            echo 'Não é possível gerar uma nota fiscal antes do pedido ser pago.' . PHP_EOL;
            return;
        }

        echo 'Nota fiscal criada com sucesso' . PHP_EOL;

        print_r([
            'Nome do cliente'     => $this->invoice->getOrder()->name,
            'Valor total'         => $this->invoice->getOrder()->value,
            'Quantidade de itens' => $this->invoice->getOrder()->quantity,
        ]);
    }
}