<?php 
 namespace Classe\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;

 class ClasseController extends AbstractActionController{
 	protected $classeTable;
     public function indexAction(){
     	 return new ViewModel(array(
             'classes' => $this->getClasseTable()->fetchAll(),
         ));
    }

     public function addAction(){
    }

     public function editAction(){
    }

     public function deleteAction(){
    }
    public function getClasseTable()
    {
         if (!$this->classeTable) {
             $sm = $this->getServiceLocator();
             $this->classeTable = $sm->get('Classe\Model\ClasseTable');
         }
         return $this->classeTable;
     }
}




?>