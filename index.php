<?php 

session_start() ;

session_destroy() ;

if (!isset($_SESSION['row'])) {
    header('location: controller/UserEvent.php?id=View-Login') ;
    exit() ;
}

header('location: controller/UserEvent.php?id=View-Login') ;