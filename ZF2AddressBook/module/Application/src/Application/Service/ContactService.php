<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Service;

use Application\Mapper\ContactMapper;

/**
 * Description of ContactService
 *
 * @author romain
 */
class ContactService
{
    /** @var ContactMapper */
    protected $mapper;
    
    public function __construct(ContactMapper $mapper) {
        $this->mapper = $mapper;
    }
    
    public function findAll()
    {
        return $this->mapper->findAll();
    }

}
