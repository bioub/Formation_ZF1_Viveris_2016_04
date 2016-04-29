<?php

namespace Application\Mapper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ContactMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $gateway = $sm->get('Application\Gateway\Contact');
        
        $hm = $sm->get('HydratorManager');
        $hydrator = $hm->get('ClassMethods');
      
        return new ContactMapper($gateway, $hydrator);
    }
}
