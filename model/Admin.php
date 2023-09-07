<?php 

class AdminClass extends Database {
    
    public function Accept() {
        $id = $_POST['id'] ;

        $sql = "UPDATE data set  shopverify = 1 WHERE  email = '$id' " ;

        mysqli_query(parent::Db(),$sql) ;

        $sql = "DELETE from request WHERE email = '$id'" ;

        return mysqli_query(parent::Db(),$sql) ;

    }


    public function NotAccept() {
        $id = $_POST['id'] ;

        $sql = "UPDATE data set  shopverify = 0 WHERE  email = '$id' " ;

        mysqli_query(parent::Db(),$sql) ;

        $sql = "DELETE from request WHERE email = '$id'" ;

        return mysqli_query(parent::Db(),$sql) ;

    }

    public function DeleteUser() {
        $id = $_POST['id'] ;

        $sql = "DELETE FROM data WHERE id = $id" ;
        
        mysqli_query(parent::Db(),$sql) ;
        
    }
}