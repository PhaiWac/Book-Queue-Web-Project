<?php 

class UserClass extends Database {

    public function Login()  {
        
        $email = $_POST['email'] ; 
        $password = $_POST['password'] ;

        $get = parent::Join('data') ;

        while ($row = mysqli_fetch_assoc($get)) {
            if ($row['email'] != $email  || $row['password'] != $password) continue ;

            session_start() ;

            $_SESSION['row'] = $row ;

            return true ;
        }

        return false ;
    }

    public function Register() {

        if (!isset($_GET['role'])) {
            $_POST['role'] = 'user' ;
        }

        $keys = implode(',',array_keys($_POST)) ;

        $values = implode(',',array_values(array_map(function($v) {
            if (!is_numeric($v)) {
                return "'".$v."'" ;
            } else {
                return $v ;
            }
        }, $_POST ))) ;

        $sql = "INSERT INTO data ($keys) VALUES ($values)" ;

        parent::Join('data',true) ;

        if (mysqli_query($this->conn,$sql)) {

            if ($_POST['role'] == 'res') {
            
                $email = $_POST['email'] ;
                parent::Join('request',true) ;
                
                $sql = "INSERT INTO request (email) VALUES ('$email')"  ;
                parent::Insert('request',$sql) ;
                
            }
            return true ;
        }else {
            return false;
        }
    }

    public function Queue() {
        session_start() ;

        if ($_SESSION['row']['myqueue'] > 0) {
            return ;
        };

        $id = $_POST['id'] ;

        $sql = "UPDATE data SET queue = queue + 1 WHERE id = $id";

        $get = mysqli_query(parent::Db(), $sql) ;

        $sqlgetid = "SELECT queue FROM data  WHERE id = $id" ;

        $getid = mysqli_query(parent::Db(),$sqlgetid) ;

        $lastqueue = mysqli_fetch_assoc($getid)['queue'] ;

        $sql2 = "UPDATE data SET myqueue = $lastqueue WHERE id = ".$_SESSION['row']['id'] ;

        $_SESSION['row']['myqueue'] = $lastqueue ;

        mysqli_query(parent::Db(), $sql2);

        $shopemail = mysqli_fetch_assoc(parent::GetUser('data','id',$id))['email'] ;
        $useremail = $_SESSION['row']['email'] ;

        $addqueue = "INSERT INTO queues (shop,user,userqueue) VALUE ('$shopemail','$useremail',$lastqueue)" ;

        mysqli_query(parent::Db(),$addqueue) ;
    }

    public function CheckMyQueue() {
        session_start() ;

        if ($_SESSION['row']['myqueue'] == 0 ) return  ;

        return $_SESSION['row']['myqueue'] - 1 ;
    }
    
}