<?php 

namespace App\Interfaces\Handler;

use App\Clients\ClientCommand;

interface HandlerInterface {
    public function handler(ClientCommand $clientCommand);
}