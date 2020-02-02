
  <?php
    include_once('users.php');
 

    if(isset($_POST['submit'])){
        $name = $_POST['user'];
        $pass = $_POST['pass'];
        $str=md5($pass);
     
        $object = new Users();
        $object->login($name, $str);
    }
  
    ?>