<?php

namespace ApplicationTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ContactControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->setApplicationConfig(require 'config/application.config.php');
    }

    public function testIndexActionIsAccessible()
    {
        $this->dispatch('/contact');
        
        $this->assertModuleName('application');
        $this->assertControllerName('Application\Controller\Contact');
        $this->assertActionName('list');
        
        $this->assertResponseStatusCode(200);
    }
    
    public function testIndexActionContent()
    {
        $this->dispatch('/contact');
        
        $this->assertQueryCount('table.table tr', 2);
    }
    
    public function testIndexActionContentWithServiceMock()
    {
        
        $mock = $this->getMockBuilder(\Application\Service\ContactService::class)
                     ->disableOriginalConstructor()
                     ->getMock();
        
        $mock->expects($this->exactly(1))
             ->method('findAll')
             ->willReturn(array(
                 (new \Application\Entity\Contact)->setId(1)->setPrenom('Jean')->setNom('Dupont')
             ));
        
        $sm = $this->getApplicationServiceLocator();
        $sm->setAllowOverride(true);
        $sm->setService('Application\Service\Contact', $mock);
        
        $this->dispatch('/contact');
        
        $this->assertQueryCount('table.table tr', 1);
    }
}
