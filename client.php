<?php

require __DIR__ . '/vendor/autoload.php';

use App\Clients\ClientCommand;
use App\Clients\ClientHandler;
use App\Clients\ClientSubject;
use App\Mails\MailObserver;
use App\Observers\ObserverCollection;

echo 'Criando cliente com iterator, observer, subject, command e handler' . PHP_EOL;

$client = new ClientCommand('Junin', new DateTime(), 'MG', 'email-fake@example.com');

echo 'Cliente' . PHP_EOL;
print_r($client);

$mailObserver = new MailObserver();
$subjectNotify = new ClientSubject(new ObserverCollection(), $client);
$subjectNotify->attach($mailObserver);

$handler = new ClientHandler($subjectNotify);
$handler->handler($client);