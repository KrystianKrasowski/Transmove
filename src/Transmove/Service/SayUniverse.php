<?php

namespace Transmove\Service;

use Transmove\Move\MoveEvent;
use Transmove\Move\OperationInterface;
use Zend\EventManager\Event;

class SayUniverse implements OperationInterface
{
    public function __invoke(Event $event)
    {
        var_dump('Universe');
    }
} 