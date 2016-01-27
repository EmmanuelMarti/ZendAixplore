<?php 
namespace Topic\Model;

use Zend\Db\TableGateway\TableGateway;

 class TopicTable
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

     public function getTopic($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveTopic(Topic $topic)
     {
         $data = array(
             'name' => $topic->name
         );

         $id = (int) $topic->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getTopic($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Topic id does not exist');
             }
         }
     }

     public function deleteTopic($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }



?>