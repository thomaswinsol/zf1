<?php
class Application_Form_Nieuws extends Zend_Form  {
   
        public function init()
        {
        // set the defaults
        $this->setMethod(Zend_Form::METHOD_POST);
        $this->setAttrib('enctype', Zend_Form::ENCTYPE_MULTIPART);
        //<form method='post' enctype='multipart/form-date'>
        
        // Titel
        $this->addElement(new Zend_Form_Element_Text('titel',array(
            'label'=>"Titel",
            'required'=>true,     
            'filters' => array('StringTrim')
        )));
        
        // Omschrijving
        $this->addElement(new Zend_Form_Element_Textarea('omschrijving',array(
            'label'=>"Omschrijving",
            'required'=>true,
            'filters' => array('StringTrim', 'StripTags'),
            'validators'=>array (),
         )));

        // Versturen
        $this->addElement(new Zend_Form_Element_Button('Versturen', array(
            'type'      => "submit",
            'label'     => 'Nieuws toevoegen',
            'required'  => false,
            'ignore'    => true
        )));

        }
}
?>
