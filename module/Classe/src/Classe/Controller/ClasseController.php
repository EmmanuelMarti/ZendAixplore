<?php 
 namespace Classe\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Classe\Model\Classe;
 use Classe\Form\ClasseForm;

 class ClasseController extends AbstractActionController{
 	protected $classeTable;
     public function indexAction(){
     	 return new ViewModel(array(
             'classes' => $this->getClasseTable()->fetchAll(),
         ));
    }

     public function addAction(){
     	$form = new ClasseForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $classe = new Classe();
            $form->setInputFilter($classe->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $classe->exchangeArray($form->getData());
                $this->getClasseTable()->saveClasse($classe);

                 // Redirect to list of albums
                return $this->redirect()->toRoute('classe');
            }
        }
        return array('form' => $form);
    }

     public function editAction(){

     	$id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('classe', array(
                 'action' => 'add'
             ));
         }

         // Get the Album with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $classe = $this->getClasseTable()->getClasse($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('classe', array(
                 'action' => 'index'
             ));
         }

         $form  = new ClasseForm();
         $form->bind($classe);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($classe->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getClasseTable()->saveClasse($classe);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('classe');
             }
         }

         return array(
             'id' => $id,
             'form' => $form,
         );
    }

     public function deleteAction(){
        $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('classe');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getClasseTable()->deleteClasse($id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('classe');
         }

         return array(
             'id'    => $id,
             'classe' => $this->getClasseTable()->getClasse($id)
         );
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