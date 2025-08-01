<?php
require_once 'connect.php';

class User extends Database {
    protected $tableName = parent::getDBname();

    // function to add users

    public function add($data){
        if(!empty($data)){
            $fileds=$placeholder=[];
            foreach($data as $field => $value){
                $fileds[] = $field;
                $placeholder[] = ':{field}';
            }
        }
        // $sql = "INSERT into {$this->tableName} (pname,email,mobile) values (:pname,:email,:mobile)";
        $sql = "INSERT into {$this->tableName} (" . implode(',',$fileds) . ") VALUES (" . implode(',',$placeholder) .")";
        $stmt = parent::$conn->prepare($sql);
        try {
            parent::$conn->beginTransaction();
            $stmt->execute($data);
            $lastInsertedID=parent::$conn->lastInsertId();
            parent::$conn->commit();
            return $lastInsertedID;
        } catch (PDOException $e) {
            echo "ERROR : ". $e->getMessage();
            parent::$conn->rollBack();
        }
    }

    // function to get Row

    // function to get Single row

    // function to count number of row

    // function to upload photo

    // function to update

    // function to delete

    // function for search
}