<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once MODELS.DS.'ConnexionDB.php';

require_once API.DS.'dataBase.php';

class UserController {
    public function construct(){}
    public function login()
    {
        require_once MODELS.DS.'usersM.php';
        require_once CLASSES.DS.'view.php';
        $name = $_POST['user'];
        $pass = $_POST['pass'];
        $_SESSION['name']=$name;
        $data = new DataBase();
        $con = $data->connect();
        $m = new ModelePersonnel($con);
        $_SESSION['nomPrenom'] = $m->get_name($name);
        $str=md5($pass);
     
        $object = new UsersModel();
        $resultat =$object->login($name, $str);
        $v=new View();
        
        if ($resultat->rowCount() == 1) {
            while ($donnees = $resultat->fetch()) {
                $type = $donnees['P_GRADE'];
                if ($type == "SAP2") {
                     //recuprer le Login de celui qui a connecte 
                     $_SESSION["user"]=$donnees['P_CODE'];
                    //header("Location: vue/saisieIntervention.php");
                    $v->change("entete.php");
                    $v->changeb(false);
                    $v->render('saisieIntervention','view');
                }
               else 
               {
                     //recuprer le Login de celui qui a connecte 
                   $_SESSION["user"]=$donnees['P_CODE'];
                    //header("Location: vue/interventions.php");
                    $v->change("enteteU.php");
                    $v->changeb(false);
                    $v->render('interventions','view1');
                }
            }
        } else {
            $v->render('home','index');
            $message = "Le login ou le mot de passe entré ne correspond à aucun compte.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            
        }

       
        //$v->render('home','view');
    }
    public function logout(){
        //Pas de données à gérer
        //La vue à afficher est la vue index
        require_once CLASSES.DS.'view.php';
        session_start();
        session_unset();
        session_destroy();
        $v=new View();
        $v->render('home','index');
    }
    public function oublier(){
        require_once CLASSES.DS.'view.php';
        $v=new View();
        $v->render('oublie','view');
    }
    public function reset()
    {
        require_once MODELS.DS.'usersM.php';
        require_once CLASSES.DS.'view.php';
        $email = $_POST['email'];
        $oubli = new UsersModel();
        $st = $oubli->oublier($email);
        $v=new View();


        if ($st->rowCount() == 1) {
            
            while ($donnees = $st->fetch()) {
                $type = $donnees['P_MDP'];
                // echo"trouver verfier votre email $type";
                $mail = new PHPMailer(true);
                $code = uniqid(true);
                $c = new ConnexionDB();
                $co= $c->connect();
                $ql = "INSERT INTO `resetpassword` (code,email) VALUES (:code,:email)";
                $stt =  $co->prepare($ql);
                $stt->bindValue(':code', $code);
                $stt->bindValue(':email', $email);
                $stt->execute();

                try {
                    //Server settings
                    // $mail->SMTPDebug = 1;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'archiprojet20@gmail.com';                     // SMTP username
                    $mail->Password   = 'Projet2020';                               // SMTP password
                    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port       = 465;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('ne-pas-repondre@pompier.com', 'Pompier');
                    $mail->addAddress($email);     // Add a recipient
                   
                    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/views/resetpassword.php?code=$code";
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Lien pour modifier votre Mot de passe  ';
                    $mail->Body    = " <h1>Cliquer sur lien pour recuprer votre mot de passe</h1>
                                         <a href='$url'>Lien</a>";
                    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    $v->render('home','index');
                    $m = "Un message a été envoyé a votre email pour recuprer votre mot de passe";
                    echo "<script type='text/javascript'>alert('$m');</script>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        } else {
            $v->render('home','index');
            $m = "L\'email entré ne correspond à aucun compte.";
          echo "<script type='text/javascript'>alert('$m');</script>";
          
        }
    }
    public function change()
    {
        require_once MODELS.DS.'usersM.php';
        require_once CLASSES.DS.'view.php';
        if (!isset($_GET['code'])) {
            exit("can't find the page"); 
        }
            $v=new View();
            $co = new DataBase();
            $c = $co->connect();
            $code = $_GET['code'];
            $newpass = md5($_POST['password2']);
            $object = new UsersModel();
            $st =$object->changement($code,$newpass);
           
        if ($st->rowCount() == 1) {
            
            while ($donnees = $st->fetch()) {
              
                $mail = $donnees['email'];
                $mise = $c->prepare("UPDATE pompier set P_MDP='$newpass' where P_EMAIL='$mail'");
                $mise->execute();
               
                $mm = "Votre mot de passe a été change avec succées ";
                echo "<script type='text/javascript'>alert('$mm');</script>";
                if($mise)
                {
                    $con = new ConnexionDB();
                    $conn = $con->connect();
                
                //header( "Location: index.php" );
                $v->render('home','index');
                //header( "refresh:0;url=".dirname(dirname($_SERVER["PHP_SELF"])) . "/index.php" );
                }
            }
        }
    }
   
    // envoir au controleur pour recupere les donnes, une fois recuperer ils seront renvoyé a la  VIEW_PROFIL

    public function information()
    {
        require_once MODELS.DS.'usersM.php';
       
        $m=new UsersModel();
        $info=$m->information();
       // var_dump($info);
        //echo $info;
        require_once CLASSES.DS.'view.php';
        $v=new View();
        $v->setVar('info',$info);
        $v->render('profil','view');
    }
    // appele la methode information pour recupere  les donnes pour ly mettre dans les formulaire 
    public function modifier()
    {
        require_once MODELS.DS.'usersM.php';
       
        $m=new UsersModel();
        $info=$m->information();
       // var_dump($info);
        //echo $info;
        require_once CLASSES.DS.'view.php';
        $v=new View();
        $v->setVar('info',$info);
        $v->render('profil','modifier');
    }

    //appelle a la methode update dans le model pour mise a jour de la base de données
    public function modifierbdd()
    {
        $name = $_POST['n'];
        $pr = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $dated = $_POST['dated'];
        $add = $_POST['add'];
        $poste = $_POST['poste'];
        $tele = $_POST['tele'];
        $email = $_POST['email'];
        $datee = $_POST['datee'];
        //echo $datee;
        require_once MODELS.DS.'usersM.php';
       
        $m=new UsersModel();
        $m->update($name,$pr,$sexe,$dated,$add,$poste,$tele,$email,$datee);

        require_once CLASSES.DS.'view.php';
        $v=new View();
        $v->render('interventions','view1');
        
    }


}
?>