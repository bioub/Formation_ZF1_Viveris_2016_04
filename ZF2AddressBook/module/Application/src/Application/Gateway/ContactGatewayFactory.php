<?php

namespace Application\Gateway;

use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ContactGatewayFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $adapter = $sm->get('Zend\Db\Adapter\Adapter');
        return new TableGateway('contact', $adapter);
    }

}
