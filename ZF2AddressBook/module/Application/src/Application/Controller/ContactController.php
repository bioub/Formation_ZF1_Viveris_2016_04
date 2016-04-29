<?php

namespace Application\Controller;

use Application\Service\ContactService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    /** @var ContactService */
    protected $service;
    
    public function __construct(ContactService $service) {
        $this->service = $service;
    }
    
    public function listAction()
    {
        return new ViewModel([
            'contacts' => $this->service->findAll()
        ]);
    }
}
