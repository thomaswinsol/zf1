<?php
class Application_Model_Nieuws1 extends Zend_Db_Table_Abstract
{
    //definiëren hoe de tabel eruit ziet
    
    protected $_name = 'nieuws';
    protected $_primary = 'id';
    
    
    public function getAllNieuws()
    {
        $this->fetchAll(); // select * from nieuws        
        //Zend db_select
        /*$db = Zend_Registry::get('db');
        $select = $db->select();
        $select->from('nieuws');
        $select->where();
        $select->order();*/                    
        
    }
    
    public function toevoegenNieuws($params) 
    {
        // $params = array('titel'=> 'lipsum', 'omschrijving' => 'bla bla');
        $this->insert($params);        
        
    }
    
    public function wijzigenNieuws($params, $id)
    {
         $where  = $this->getAdapter()->quoteInto('id= ?', $id);
         $this->update($params, $where);   
    }       
        
    public function verwijderNieuws($id)
    {
         $where  = $this->getAdapter()->quoteInto('id= ?', $id);
         $this->delete($where);   
    }    
        
    
    
    
}
?>
