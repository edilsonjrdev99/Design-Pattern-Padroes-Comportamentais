<?php

namespace App\Mails;

use App\Interfaces\Observer\ObserverInterface;

class MailObserver implements ObserverInterface {
    public function update(mixed $data) {
        echo 'E-mail enviado com sucesso para ' . $data->email . PHP_EOL;
    }
}