<?php

class ContactController extends Zend_Controller_Action
{
    /**
     *
     * @var Zend_Controller_Request_Http
     */
    protected $_request;
    
    /**
     *
     * @var Zend_Controller_Response_Http
     */
    protected $_response;
    
    /**
     *
     * @var Zend_Controller_Action_Helper_Redirector
     */
    protected $_redirector;
    
    /**
     *
     * @var Zend_Controller_Action_Helper_FlashMessenger
     */
    protected $_flashMessenger;
    
    protected $service;
    
    public function init()
    {
        /* Initialize action controller here */
        $this->_redirector = $this->_helper->redirector;
        $this->_flashMessenger = $this->_helper->flashMessenger;
        $this->service = new Application_Service_Contact();
    }

    public function indexAction()
    {
        $this->view->contacts = $this->service->findAll();
    }

    public function showAction()
    {
        $id = $this->_request->getParam('id');
        
        $contact = $this->service->find($id);
        
        if (!$contact) {
            throw new Zend_Controller_Action_Exception("Le contact n'existe pas", 404);
        }
        
        $this->view->contact = $contact;
    }

    public function addAction()
    {
        $form = new Application_Form_Contact();
        
        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();
            $contact = $this->service->add($data, $form);
            
            if ($contact) {
                $this->_redirector->gotoRouteAndExit(array(
                    'controller' => 'contact',
                    'action' => 'show',
                    'id' => $contact->getId()
                ), null, true);
            }
        }
        
        $this->view->contactForm = $form;
    }

    public function updateAction()
    {
        // action body
    }

    public function removeAction()
    {
        if ($this->_request->isPost()) {
            
            if ($this->_request->getPost('confirm') === 'oui') {
                $id = $this->_request->getParam('id');
                $this->service->delete($id);
                
                $this->_flashMessenger->addMessage('Le contact a bien été supprimé', 'success');
            }
            
            $this->_redirector->gotoRouteAndExit(array(
                'controller' => 'contact'
            ), null, true);
        }
        
        $this->showAction();
    }


}









