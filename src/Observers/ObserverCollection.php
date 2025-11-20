<?php

namespace App\Observers;

use App\Interfaces\Observer\ObserverInterface;
use ArrayIterator;
use IteratorAggregate;
use Traversable;

class ObserverCollection implements IteratorAggregate {
    /** @var ObserverInterface[] */
    private array $observers = [];

    public function add(ObserverInterface $observer) {
        $this->observers[] = $observer;
    }

    public function getIterator(): Traversable {
        return new ArrayIterator($this->observers);
    }
}