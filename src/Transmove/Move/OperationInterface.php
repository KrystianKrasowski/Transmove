<?php

namespace Transmove\Move;

use Zend\EventManager\Event;

interface OperationInterface
{
    public function __invoke(Event $event);
}