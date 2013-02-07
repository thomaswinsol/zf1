<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initNavigation()
    {
        // Registreer de navigatie plugin
        $this->bootstrap('frontController');
        $front = $this->getResource('frontController');
        
        $front->registerPlugin(new Syntra_Controller_Plugin_Navigation());
        
    }
    
    
    public function _initDbAdapter() 
    {
        $this->bootstrap('db');
        $db = $this->getResource('db');        
        Zend_Registry::set('db', $db);
        //  ophalen dmv  Zend_Registry::get('db');
    }
    
}

