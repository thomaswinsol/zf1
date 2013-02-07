<?php

class NieuwsController extends Zend_Controller_Action
{

    public $db;
    
    public function init()
    {
        /* Initialize action controller here */
        $this->db = Zend_Registry::get('db');
    }

    public function indexAction()
    {
        
    }

    public function overzichtAction()
    {
        
        $sql = 'select * from nieuws';
        $result = $this->db->query($sql);
        $nieuws = $result->fetchAll();
        //var_dump($nieuws);
        //die();
        $this->view->nieuws = $nieuws;
                
    }

    public function toevoegenAction()
    {
        $form  = new Application_Form_Nieuws;
        $this->view->form = $form;    
        
        if ($this->getRequest()->isPost()){
            $postParams= $this->getRequest()->getPost();
            
            if ($this->view->form->isValid($postParams)) {                                            
                $db = Zend_Registry::get('db');
            
                $sql = "Insert into nieuws (titel, omschrijving) 
                        values ('". $postParams['titel'] . "' , '". $postParams['omschrijving'] ."')";
            
                $db->query($sql);
                
                $this->_redirect('/nieuws/overzicht');
                
            }            
        }
        
    }

    public function verwijderenAction()
    {
        
    }

    public function wijzigenAction()
    {
        $id = (int) $this->_getParam('id'); //$_GET['id];
        $sql = "select * from nieuws where id = " .$id;                
        
        $result = $this->db->query($sql);
        $nieuws = $result->fetch();
        
        $form = new Application_Form_Nieuws();
        
        $form->getElement('titel')->setValue($nieuws['titel']);
        $form->getElement('omschrijving')->setValue($nieuws['omschrijving']);
                
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()){
            $postParams= $this->getRequest()->getPost();
            
            if ($this->view->form->isValid($postParams)) {                                            
                $db = Zend_Registry::get('db');
                
                //$id = (int) $this->_getParam('id');
                
                $sql = "Update nieuws set titel= '". $postParams['titel']. "' ," 
                        . " omschrijving= '". $postParams['titel']."' where id= ".$id;
            
                $db->query($sql);
                
                $this->_redirect('/nieuws/overzicht');
                
            }            
        }
    }


}









