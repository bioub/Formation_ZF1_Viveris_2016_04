<?php


class Application_Service_Contact
{
    /**
     *
     * @var Application_Model_Mapper_Contact 
     */
    protected $mapper;
    
    public function __construct() {
        $this->mapper = new Application_Model_Mapper_Contact();
    }
    
    public function findAll()
    {
        return $this->mapper->findAll();
    }
    
    /**
     * Find contact by id
     * @param int $id
     * @return Application_Model_Contact
     */
    public function find($id)
    {
        return $this->mapper->find($id);
    }
    
    /**
     * Deletes a contact by id
     * @param int $id
     * @return Application_Model_Contact
     */
    public function delete($id)
    {
        return $this->mapper->delete($id);
    }
    
    public function add(Array $data, Zend_Form $form)
    {
        if (!$form->isValid($data)) {
            return null;
        }
        
        $row = $form->getValues();
        
        $contact = new Application_Model_Contact();
        $contact->setPrenom($row['prenom'])
                ->setNom($row['nom'])
                ->setEmail($row['email'])
                ->setTelephone($row['telephone']);
        
        $this->mapper->insert($contact);
        
        return $contact;
    }
}
