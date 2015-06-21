<?php

namespace Transmove\Mvc;

use Transmove\Move\MoveEvent;
use Zend\Mvc\Controller\AbstractController;
use Zend\Mvc\MvcEvent;

class OperationController extends AbstractController
{
    private $operationManager;
    private $lastResponse;

    public function getOperationManager()
    {
        return $this->operationManager;
    }

    public function onDispatch(MvcEvent $e)
    {
        $operations = $e->getRouteMatch()->getParam('operations');

        if ($operations === null || !is_array($operations)) {
            throw new Exception\LogicException('Operations has not beed properly defined for this request');
        }

        $operationsPriorified = array_reverse($operations, true);

        array_walk($operationsPriorified, array($this, 'setupOperationListener'));
        array_walk($operationsPriorified, array($this, 'triggerOperation'));

        $e->setResult($this->lastResponse);

        return $this->lastResponse;
    }

    public function setupOperationListener($opName, $priority)
    {
        $operationManager = $this
            ->getServiceLocator()
            ->get('Transmove\OperationManager');

        $operation = $operationManager->get($opName);

        $this->getEventManager()->attach($opName, $operation, $priority);
    }

    public function triggerOperation($opName)
    {
        $event = new MoveEvent($opName);
        $result = $this->getEventManager()->trigger($event);

        $this->lastResponse = $result->last();
    }
} 