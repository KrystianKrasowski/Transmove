<?php

namespace Transmove\Service;

use Transmove\Move\MoveEvent;
use Transmove\Move\OperationInterface;
use Zend\EventManager\Event;

class SayWorld implements OperationInterface
{
    public function __invoke(Event $event)
    {
        var_dump('World');
    }
}