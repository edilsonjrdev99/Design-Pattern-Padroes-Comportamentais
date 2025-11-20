<?php

namespace App\Clients;

use App\Interfaces\Handler\HandlerInterface;
use App\Clients\ClientCommand;
use App\Interfaces\Subject\SubjectInterface;

class ClientHandler implements HandlerInterface {
    public function __construct(
        private SubjectInterface $clientSubject
    ) {}

    public function handler(ClientCommand $clientCommand) {
        echo "O cliente $clientCommand->name foi criado com sucesso" . PHP_EOL;
        $this->clientSubject->notify($clientCommand);
    }
}