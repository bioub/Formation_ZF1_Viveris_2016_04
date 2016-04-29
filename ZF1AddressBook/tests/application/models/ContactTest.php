<?php

require_once __DIR__ . '/../../../application/models/Contact.php';

class Application_Model_ContactTest extends PHPUnit_Framework_TestCase
{
    protected $contact;
    
    public function setUp() {
        $this->contact = new Application_Model_Contact();
    }
    
    public function tearDown() {
        
    }
    
    public function testInitialPropertiesAreNull()
    {
        $this->assertNull($this->contact->getId());
        $this->assertNull($this->contact->getPrenom());
        $this->assertNull($this->contact->getNom());
        $this->assertNull($this->contact->getEmail());
        $this->assertNull($this->contact->getTelephone());
    }
    
    public function testGetSetPrenom()
    {
        $this->contact->setPrenom('Romain');
        $this->assertEquals('Romain', $this->contact->getPrenom());
    }
}
