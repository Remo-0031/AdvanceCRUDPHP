<?php

class Database {
    private $hostName = 'localhost';
    private $dbusername = 'root';
    private $dbpassword = '';
    private $dbname = 'userdata';
    protected $conn; 

    public function __construct(){
        try {
            $dsn ="mysql:host={$this->hostName};dbname={$this->dbname}; charset=utf8";
            $options = [PDO::ATTR_PERSISTENT];
            $this->conn = new PDO($dsn,$this->dbusername,$this->dbpassword,$options);
        }catch(PDOException $e){
            die("PDO Exception" . $e->getMessage());
        }
    }

}