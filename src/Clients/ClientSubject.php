<?php

namespace App\Clients;

use App\Interfaces\Observer\ObserverInterface;
use App\Interfaces\Subject\SubjectInterface;
use App\Observers\ObserverCollection;

class ClientSubject implements SubjectInterface {
    public function __construct(
        private ObserverCollection $observerCollection,
        private ClientCommand $clientCommand
    ) {}

    public function attach(ObserverInterface $observer) {
        $this->observerCollection->add($observer);
    }
    
    public function notify(mixed $data): void {
        foreach($this->observerCollection as $observer) {
            $observer->update($this->clientCommand);
        }
    }
}