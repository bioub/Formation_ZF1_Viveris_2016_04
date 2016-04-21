<?php


class Zend_View_Helper_SuccessMessages extends Zend_View_Helper_Abstract
{
    
    public function successMessages()
    {
        $flashMessenger = new Zend_Controller_Action_Helper_FlashMessenger();
        $successMessages = $flashMessenger->getMessages('success');
        
        $html = '';
        
        foreach ($successMessages as $msg) {
            $html .= '<div class="alert alert-success alert-dismissable">';
            $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $html .= $msg;
            $html .= '</div>';
        }
        
        return $html;
    }
}
