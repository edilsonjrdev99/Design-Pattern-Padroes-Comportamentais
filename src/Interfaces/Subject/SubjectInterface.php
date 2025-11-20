<?php

namespace App\Interfaces\Subject;

use App\Interfaces\Observer\ObserverInterface;

interface SubjectInterface {
    public function attach(ObserverInterface $data);
    public function notify(mixed $data): void;
}