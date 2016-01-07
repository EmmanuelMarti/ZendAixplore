<?php 
namespace Classe\Model;

use Zend\Db\TableGateway\TableGateway;

 class ClasseTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getClasse($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveClasse(Classe $classe)
     {
         $data = array(
             'name' => $classe->name
         );

         $id = (int) $classe->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getClasse($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Classe id does not exist');
             }
         }
     }

     public function deleteClasse($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }



?>