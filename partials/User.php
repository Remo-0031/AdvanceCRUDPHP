<?php
require_once 'connect.php';

class User extends Database {
    protected $tableName = 'users';

    // function to add users

    public function add($data){
        if(!empty($data)){
            $fileds=$placeholder=[];
            foreach($data as $field => $value){
                $fileds[] = $field;
                $placeholder[] = ":$field";
            }
        }
        // $sql = "INSERT into {$this->tableName} (pname,email,mobile) values (:pname,:email,:mobile)";
        $sql = "INSERT into {$this->tableName} (" . implode(',',$fileds) . ") VALUES (" . implode(',',$placeholder) .")";
        $stmt = $this->conn->prepare($sql);
        try {
            $this->conn->beginTransaction();
            $stmt->execute($data);
            $lastInsertedID=$this->conn->lastInsertId();
            $this->conn->commit();
            return $lastInsertedID;
        } catch (PDOException $e) {
            echo "ERROR : ". $e->getMessage();
            $this->conn->rollBack();
        }
    }

    // function to get Row

    public function getRows($start=0,$limit=4) {
        $sql = "SELECT * from {$this->tableName} order by id ASC LIMIT {$start},{$limit};";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if($stmt-> rowCount()> 0){
           $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else {
            $row = [];
        }
        return $row;
    }

    // function to get Single row

    public function getRow($field,$value){
        $sql = "SELECT * from {$this->tableName} where {$field}=:$field;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":$field"=>$value]);
        if($stmt->rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }else {
            $row = [];
        }
        return $row;

    }

    // function to count number of row

    public function getCount(){
        $sql = "SELECT count(*) as pcount from {$this->tableName};";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['pcount'];
    }

    // function to upload photo

    public function uploadPhoto($file){
        if(!empty($file)){
            $fileTempPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileType = $file['type'];
            $fileNameCmps = explode('.',$fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time().$fileName) . "." . $fileExtension;
            $allowedExt = ['jpg','png','jpeg'];
            if(in_array($fileExtension,$allowedExt)){
                $uploadFileDir = getcwd()."/uploads/";
                $destFilePath = $uploadFileDir . $newFileName;
                if(move_uploaded_file($fileTempPath,$destFilePath)){
                    return $newFileName;
                }
            }
        }
    }

    // function to update

    // function to delete

    // function for search
}