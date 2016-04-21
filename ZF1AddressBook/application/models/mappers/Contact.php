<?php

class Application_Model_Mapper_Contact
{
    /**
     *
     * @var Zend_Db_Table
     */
    protected $gateway;
    
    public function __construct()
    {
        $this->gateway = new Zend_Db_Table(array('name' => 'contact'));
    }
    
    public function findAll()
    {
        $array = $this->gateway->fetchAll();
        $results = array();
        
        foreach ($array as $row) {
            $contact = new Application_Model_Contact();
            $contact->setId($row['id'])
                    ->setPrenom($row['prenom'])
                    ->setNom($row['nom'])
                    ->setEmail($row['email'])
                    ->setTelephone($row['telephone']);
            
            $results[] = $contact;
        }
        
        return $results;
    }
    
    /**
     * Finds contact by id
     * @param int $id
     * @return Application_Model_Contact
     */
    public function find($id)
    {
        $row = $this->gateway->fetchRow(array('id = ?' => $id));
        
        if (!$row) {
            return null;
        }
        
        $contact = new Application_Model_Contact();
        $contact->setId($row['id'])
                ->setPrenom($row['prenom'])
                ->setNom($row['nom'])
                ->setEmail($row['email'])
                ->setTelephone($row['telephone']);
        
        return $contact;
    }
    
    public function delete($id)
    {
        return (bool) $this->gateway->delete(array('id = ?' => $id));
    }
    
    public function insert(Application_Model_Contact $contact)
    {
        $data = array();
        $data['prenom'] = $contact->getPrenom();
        $data['nom'] = $contact->getNom();
        $data['email'] = $contact->getEmail();
        $data['telephone'] = $contact->getTelephone();
        
        $id = $this->gateway->insert($data);
        
        $contact->setId($id);
    }
}
