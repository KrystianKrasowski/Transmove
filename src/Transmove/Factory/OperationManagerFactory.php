<?php

namespace Transmove\Factory;

use Transmove\Move\OperationManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class OperationManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config')['operation_manager'];
        $opManager = new OperationManager($config);

        return $opManager;
    }
}