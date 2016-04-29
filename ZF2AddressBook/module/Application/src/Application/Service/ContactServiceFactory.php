<?php

namespace Application\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ContactServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $mapper = $sm->get('Application\Mapper\Contact');
        return new ContactService($mapper);
    }

}
