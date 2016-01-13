<?php 

namespace Classe\Form;

 use Zend\Form\Form;

 class ClasseForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('classe');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'name',
             'id' => 'ck',
             'type' => 'Textarea',
             'options' => array(
                 'label' => 'Class Name',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }

?>