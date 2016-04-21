<?php


class Zend_View_Helper_MyUrl extends Zend_View_Helper_Abstract
{
    public function myUrl($controller, $action = 'index', $params = array())
    {
        $params['controller'] = $controller;
        $params['action'] = $action;
        
        return $this->view->url($params, null, true);
    }
}
