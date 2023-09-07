<?php 

require('../model/Database.php') ;
require('../model/User.php') ;
require('../model/Admin.php') ;

$event = $_GET['id'] ?? null ;

if (!$event) return ;

class EventUser extends UserClass {

    public function ViewLogin() {
        include('../view/Nav.php') ;
        include('../view/Login.php') ;
    }

    public function ViewRegister() {
        include('../view/Nav.php') ;
        if ($_GET['type'] == 'user')  {
            include('../view/UserRegister.php') ;
            exit() ;
        } else if ($_GET['type'] == 'res') {
            include('../view/ShopRegister.php') ;
        }
    }

    public function ViewUserHome() {
        $data = parent::Join('data') ;
        include('../view/Nav.php') ;
        include('../view/UserHome.php') ;      
    }

    public function ViewAdminHome() {
        $data = parent::Join("request") ;
        include('../view/Nav.php') ;
        include('../view/Adminhome.php') ;
    }

    public function ViewMyQueue() {
        $data = parent::CheckMyQueue() ;
        if (!$data) return header('location: ?id=View-Home'); 
        include('../view/Nav.php') ;
        include('../view/Myqueue.php') ;
    }

    public function ViewHome() {
        session_start() ;
        $role = $_SESSION['row']['role'] ;

        switch ($role) {
            case 'admin' : return $this->ViewAdminHome() ; 
            case 'user' : return $this->ViewUserHome() ;
            case 'res' : return ;
        }
    }

    public function Register() {
        $register = parent::Register() ;

        if ($register) {
            header('location: ?id=View-Login') ;
        }else {
            echo 'not succes' ;
        }
    }

    public function Login() {
        $logged = parent::Login() ;

        if (!$logged) {
            header('location: ?id=View-Login') ;
        }else {
            header('location: ?id=View-Home') ;
        }
    }

    public function AddQueue() {
        parent::Queue() ;
    }
    
}

class EventAdmin extends AdminClass {

    public function AcceptShop() {
        parent::Accept() ;
    }

    public function NotAccept() {
        parent::Accept() ;
    }

    public function ViewUser() {
        $data = parent::Join('data') ;
        include('../view/Nav.php') ;
        include('../view/ViewAllUser.php') ;
    }

    public function ViewShop() {
        $data = parent::Join('data') ;
        include('../view/Nav.php') ;
        include('../view/ViewAllShop.php') ;
    }

    public function DeleteUser() {
        parent::DeleteUser() ;
    }
}

$User = new EventUser ;
$Admin = new EventAdmin ;

switch ($event) {
    case 'Login' : return  $User->Login() ;
    case 'Register' : return $User->Register() ;
    case 'AcceptShop' : return $Admin->AcceptShop() ;
    case 'NotAcceptShop' : return $Admin->NotAccept() ;
    case 'DeleteUser' : return $Admin->DeleteUser() ;
    case 'Queue' : return $User->AddQueue() ;

    case 'View-Home' : return $User->ViewHome() ;
    case 'View-Login' : return  $User->ViewLogin() ;
    case 'View-Register' : return  $User->ViewRegister();
    case 'View-Home' : return $User->ViewHome() ;
    case 'View-AllUser' : return $Admin->ViewUser() ;
    case 'View-Shop' : return $Admin->ViewShop() ;
    case 'View-MyQueue' : return $User->ViewMyQueue() ;
}