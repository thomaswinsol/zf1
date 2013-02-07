<?php

class Nieuws1Controller extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function wijzigenAction()
    {
         
        $id = (int) $this->_getParam('id'); //$_GET['id];
        /*$sql = "select * from nieuws where id = " .$id;                
        
        $result = $this->db->query($sql);
        $nieuws = $result->fetch();*/
        
        $nieuwsModel = new Application_Model_Nieuws1();
        $nieuws = $nieuwsModel->find($id)->current(); // select * from nieuws where id = $id;
        
        /*var_dump($nieuws->toArray());
        die();*/
        
        $form = new Application_Form_Nieuws();
        $form->populate($nieuws->toArray());
        
        /*$form->getElement('titel')->setValue($nieuws['titel']);
        $form->getElement('omschrijving')->setValue($nieuws['omschrijving']);*/
                
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()){
            $postParams= $this->getRequest()->getPost();
            
            if ($this->view->form->isValid($postParams)) {                                            
                $db = Zend_Registry::get('db');
                
                //$id = (int) $this->_getParam('id');
                
                /*$sql = "Update nieuws set titel= '". $postParams['titel']. "' ," 
                        . " omschrijving= '". $postParams['titel']."' where id= ".$id;
            
                $db->query($sql);*/
                
                unset($postParams['Versturen']);
                //$nieuwsModel = new Application_Model_Nieuws1();
                $nieuwsModel->wijzigenNieuws($postParams, $id);
                
                $this->_redirect('/nieuws/overzicht');
                
            }            
        }
        
        
        
    }

    public function verwijderenAction()
    {
        // action body
    }

    public function toevoegenAction()
    {
        $form  = new Application_Form_Nieuws;
        $this->view->form = $form;    
        
        if ($this->getRequest()->isPost()){
            $postParams= $this->getRequest()->getPost();
            
            if ($this->view->form->isValid($postParams)) {                                            
                /*$db = Zend_Registry::get('db');            
                $sql = "Insert into nieuws (titel, omschrijving) 
                        values ('". $postParams['titel'] . "' , '". $postParams['omschrijving'] ."')";            
                $db->query($sql);*/
                
                unset($postParams['Versturen']);
                $nieuwsModel = new Application_Model_Nieuws1();
                $nieuwsModel->toevoegenNieuws($postParams);
                
                //$this->_redirect('/nieuws1/overzicht');
                $this->_redirect($this->view->url(array('controller'=> 'Nieuws1', 'action'=> 'overzicht')));
                
                
            }            
        }
        
    }

    public function overzichtAction()
    {
        // action body
    }


}









