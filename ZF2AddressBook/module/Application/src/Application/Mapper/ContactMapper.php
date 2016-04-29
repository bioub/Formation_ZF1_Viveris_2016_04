<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Mapper;

use Application\Entity\Contact;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\HydratorInterface;

/**
 * Description of ContactMapper
 *
 * @author romain
 */
class ContactMapper
{

    /** @var TableGateway */
    protected $gateway;

    /** @var HydratorInterface */
    protected $hydrator;

    public function __construct(TableGateway $gateway, HydratorInterface $hydrator)
    {
        $this->gateway = $gateway;
        $this->hydrator = $hydrator;
    }

    public function findAll()
    {
        $array = $this->gateway->select();
        $results = [];

        foreach ($array as $row)
        {
            $contact = new Contact();
            
            $this->hydrator->hydrate((array) $row, $contact);

            $results[] = $contact;
        }

        return $results;
    }

}
