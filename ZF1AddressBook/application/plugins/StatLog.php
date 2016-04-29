<?php

class Application_Plugin_StatLog extends Zend_Controller_Plugin_Abstract
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
    
    public function routeStartup(\Zend_Controller_Request_Abstract $request)
    {
        $writer = new Zend_Log_Writer_Stream(APPLICATION_PATH . '/../logs/app.log');
        $logger = new Zend_Log($writer);
        
        $logger->info($this->_request->getRequestUri());
    }

}
