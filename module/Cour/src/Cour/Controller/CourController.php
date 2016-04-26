<?php 
 namespace Cour\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Cour\Model\Cour;
 use Cour\Form\CourForm;

 class CourController extends AbstractActionController{
 	protected $courTable;
    public function indexAction(){
     	 return new ViewModel(array(
             'cours' => $this->getCourTable()->fetchAll(),
         ));
    }

    public function viewindexAction(){
         return new ViewModel(array(
             'cours' => $this->getCourTable()->fetchAll(),
         ));
    }

     public function addAction(){
     	$form = new CourForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $cour = new Cour();
            $form->setInputFilter($cour->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $cour->exchangeArray($form->getData());
                $this->getCourTable()->saveCour($cour);

                 // Redirect to list of albums
                return $this->redirect()->toRoute('cour');
            }
        }
        return array('form' => $form);
    }

     public function editAction(){

     	$id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('cour', array(
                 'action' => 'add'
             ));
         }

         // Get the Album with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $cour = $this->getCourTable()->getCour($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('cour', array(
                 'action' => 'index'
             ));
         }

         $form  = new CourForm();
         $form->bind($cour);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($cour->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getCourTable()->saveCour($cour);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('cour');
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
             return $this->redirect()->toRoute('cour');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getCourTable()->deleteCour($id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('cour');
         }

         return array(
             'id'    => $id,
             'cour' => $this->getCourTable()->getCour($id)
         );
    }
    public function getCourTable()
    {
         if (!$this->courTable) {
             $sm = $this->getServiceLocator();
             $this->courTable = $sm->get('Cour\Model\CourTable');
         }
         return $this->courTable;
     }
}




?>