<?php 
namespace Cour\Model;

use Zend\Db\TableGateway\TableGateway;

 class CourTable
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

     public function getCour($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveCour(Cour $cour)
     {
         $data = array(
             'name' => $cour->name
         );

         $id = (int) $cour->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getCour($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Cour id does not exist');
             }
         }
     }

     public function deleteCour($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }



?>