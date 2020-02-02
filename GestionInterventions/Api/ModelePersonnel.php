<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
include_once '../Modele/ConnexionDB.php';

class ModelePersonnel
{
    private $con;

    function __construct($con)
    {
        $this->con =$con;
    }
    //Pour vérifier si les matricule et le mp existe dans la base de donnée
    public function check_conn($name,$pass) {
        {
            if (!empty($name) && !empty($pass)) {
    
                $st = $this->con->prepare("select P_CODE,P_MDP,P_GRADE from pompier where P_CODE=? and P_MDP=?");
                $st->bindParam(1, $name);
    
                $st->bindParam(2, $pass);
                $st->execute();
    
                if ($st->rowCount() == 1) {
                    while ($donnees = $st->fetch()) {
                        $type = $donnees['P_GRADE'];
                        if ($type == "SAP2") {
                            header("Location: ../vue/saisieIntervention.php");
                        }
                       else 
                       {
                            echo "bienvenu $type";
                            header("Location: ../vue/interventions.php");
                        }
                    }
                } else {
                    header( "refresh:0;url=../vue/index.php" );
                    $message = "Le login ou le mot de passe entré ne correspond à aucun compte.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    
                }
            }
        }     
  
	
    }


    function get_pass($email) {
       
        $st = $this->con->prepare("select P_MDP from pompier where P_EMAIL=?");
        $st->bindParam(1, $email);
        $st->execute();
       
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
                    //$mail->addAddress('ellen@example.com');               // Name is optional
                    //$mail->addReplyTo('info@example.com', 'Information');
                    //$mail->addCC('cc@example.com');
                    //$mail->addBCC('bcc@example.com');

                    // Attachments
                    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                    // Content
                    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname(dirname($_SERVER["PHP_SELF"])) . "/vue/resetpassword.php?code=$code";
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Lien pour modifier votre Mot de passe  ';
                    $mail->Body    = " <h1>Cliquer sur lien pour recuprer votre mot de passe</h1>
                                         <a href='$url'>Lien</a>";
                    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo "<h1>Un message a été envoyé a voitre email pour recuprer votre mot de passe </h1>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        } else {
           
            $m = "L\'email entré ne correspond à aucun compte.";
          echo "<script type='text/javascript'>alert('$m');</script>";
          
        }

        exit();
    }
    public function changer($code, $pass)
    {
        //echo "bonjour ";
        $st = $this->con->prepare("SELECT code, email from resetpassword where code=?");
        $st->bindParam(1, $code);
        $st->execute();

        if ($st->rowCount() == 1) {
            while ($donnees = $st->fetch()) {
                $mail = $donnees['email'];
                //echo "$mail and $pass";
                $mise = $this->con->prepare("UPDATE pompier set P_MDP='$pass' where P_email='$mail'");
                $mise->execute();
                $mm = "Votre mot de passe a été change avec succées ";
                echo "<script type='text/javascript'>alert('$mm');</script>";
                if($mise)
                {
                $del = $this->con->prepare("DELETE from resetpassword where code='$code'");
                $del->execute();
                //header( "Location: index.php" );
                header( "refresh:0;url=".dirname(dirname($_SERVER["PHP_SELF"])) . "/vue/index.php" );
                }
            }
        }
    }
	function get_p_code($nom,$prenom) {
       
        $exe = $this->con->prepare('SELECT * FROM pompier WHERE P_NOM =? AND P_PRENOM=?');
        $exe->bindParam(1, $nom);
        $exe->bindParam(2, $prenom);
        $exe->execute();
        $Liste = array(); 
        
        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
            
            $Liste = array("P_CODE" => $result->P_CODE);
    
        }
    
        return $Liste;
    }      

    function get_names() {
       
        $exe = $this->con->prepare('SELECT * FROM pompier');
        $exe->execute();
        $Liste = array(); 
        
        while($result = $exe->fetch(PDO::FETCH_OBJ)) {
           
            $row=array("P_PRENOM" => $result->P_PRENOM ,"P_NOM" => $result->P_NOM);
            array_push($Liste,$row);
            
        }
    
        return $Liste;
    }      





}

?>