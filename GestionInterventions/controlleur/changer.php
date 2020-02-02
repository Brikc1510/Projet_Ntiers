<?php
include_once('../controlleur/users.php');
if (!isset($_GET['code'])) {
    exit("can't find the page"); 
}

    $code = $_GET['code']; 
    echo $code;
if(isset($_POST['submit'])){
        $newpass = md5($_POST['password2']);
        echo $newpass;
    
        $object = new Users();
        $object->changement($code, $newpass); 
    
    }

?>    