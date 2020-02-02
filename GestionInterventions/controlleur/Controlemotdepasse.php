<?php

include_once('users.php');

if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
   
    //$pass = $_POST['pass'];
    //$str=md5($pass);
  
    $oubli = new Users();
    $oubli->oublier($email);
}

?>