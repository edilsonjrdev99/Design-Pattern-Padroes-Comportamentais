<?php

namespace App\Clients;

use DateTime;

class ClientCommand {
    public function __construct(
        public readonly string $name,
        public readonly DateTime $createdAt,
        public readonly string $stateCode,
        public readonly string $email
    ) {}
}