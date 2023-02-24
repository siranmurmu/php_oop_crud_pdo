<?php

class DB{

    private $dbHost     = "localhost"; 
    private $dbUsername = "root"; 
    private $dbPassword = "adminadmin"; 
    private $dbName     = "primax"; 
    private $db;


    public function __construct(){ 
        if(!isset($this->db)){ 
            // Connect to the database 
            try{ 
                $conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword); 
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $this->db = $conn; 
            }catch(PDOException $e){ 
                die("Failed to connect with MySQL: " . $e->getMessage()); 
            } 
        } 
    } 

    public function insertData($name,$table){
        $sql = "INSERT INTO $table SET name = :name";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name'=>$name));
        return true;
    }

    public function showData($table){
        $sql = "SELECT * FROM $table";
        $query = $this->db->query($sql);
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $data[]=$row;
        }
        return $data;
    }

    public function getById($id,$table){

        $sql="SELECT * FROM $table WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id'=>$id));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function update($id,$name,$table){
        $sql = "UPDATE $table SET name = :name WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id'=>$id,':name'=>$name));
        return true;
    }

    public function deleteData($id,$table){
        $sql = "DELETE FROM $table WHERE id=:id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id'=>$id));
        return true;
    }
}

?>