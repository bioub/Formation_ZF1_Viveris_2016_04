<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        setlocale(LC_TIME, "fr_FR", "fr", "fr_FR.UTF8", "fr_FR.UTF-8");
        $dateMessage = strftime("Nous sommes %A");
        
        $this->view->dateMsg = $dateMessage;
    }


}

