<?php

class ContactControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testIndexActionIsAccessible()
    {
        $urlOptions = array(
            'controller' => 'contact',
            'action' => 'index',
            'module' => 'default'
        );
        
        $urlOptions = $this->urlizeOptions($urlOptions);
        $url = $this->url($urlOptions);
        
        $this->dispatch($url);
        
        $this->assertModule($urlOptions['module']);
        $this->assertController($urlOptions['controller']);
        $this->assertAction($urlOptions['action']);
        
        $this->assertResponseCode(200);
    }
    
    public function testIndexActionContent()
    {
        $urlOptions = array(
            'controller' => 'contact',
            'action' => 'index',
            'module' => 'default'
        );
        
        $urlOptions = $this->urlizeOptions($urlOptions);
        $url = $this->url($urlOptions);
        
        $this->dispatch($url);
        
        $this->assertQueryCount('table.table tr', 2);
    }
    
    public function testIndexActionContentWithServiceMock()
    {
        $urlOptions = array(
            'controller' => 'contact',
            'action' => 'index',
            'module' => 'default'
        );
        
        $urlOptions = $this->urlizeOptions($urlOptions);
        $url = $this->url($urlOptions);
        
        $mock = $this->getMockBuilder('Application_Service_Contact')
                     ->disableOriginalConstructor()
                     ->getMock();
        
        $mock->expects($this->exactly(1))
             ->method('findAll')
             ->willReturn(array(
                 (new Application_Model_Contact)->setId(1)->setPrenom('Jean')->setNom('Dupont')
             ));
        
        Zend_Registry::set('contactService', $mock);
        
        $this->dispatch($url);
        
        $this->assertQueryCount('table.table tr', 1);
    }
}

