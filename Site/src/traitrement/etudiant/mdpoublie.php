<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once "../../bdd/BDD.php";
require_once "../../modele/Php_Table.php";
require_once "../../modele/compte/Compte.php";
require_once "../../modele/compte/Etudiant.php";
require_once "../../../vendor/autoload.php";

$bdd = new BDD();
$etudiant = new Etudiant(array(
    "mail"=>$_POST['mail']
));
if($etudiant->mdpoublie($bdd)){
    $mail = new PHPMailer(true);
    try{
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "robertschumanphp@gmail.com";
        $mail->Password = "phprobertshcuman";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->setFrom("robertschuman@gmail.com");
        $mail->addAddress($_POST['mail']);
        $mail->isHTML(true);
        $mail->Subject = "Mot de passe Notenote oublié";
        $mail->Body = "Vous avez oublié votre mot de passe?";
        $mail->send();
    }catch (Exception $exception){}
}
header("Location: ../../../index.php");