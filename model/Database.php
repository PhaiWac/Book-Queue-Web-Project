<?php 

class Database {
    public $conn ; 


    public function Db() {
        return mysqli_connect('localhost:3306','root','123','satangproject') ;
    }

    public function Join($table,$join = false) {

        $this->conn = mysqli_connect('localhost:3306','root','123','satangproject') ;

        $sql = "SELECT * FROM $table" ;


        if (!$join) {
            return mysqli_query($this->conn,$sql) ;
        }
    }
    
    public function Insert($table,$sql) {
        $this->conn = mysqli_connect('localhost:3306','root','123','satangproject') ;

        return mysqli_query($this->conn,$sql) ;
    }

    public function GetUser($table,$index,$value) {
        $sql = "SELECT * FROM $table WHERE $index = $value" ;

        return mysqli_query($this->Db(),$sql) ;
    }
}