<?php
session_start();
require_once "../../bdd/BDD.php";
require_once "../../modele/Php_Table.php";
require_once "../../modele/compte/Compte.php";
require_once "../../modele/compte/Direction.php";

$bdd = new BDD();
$direction = new Direction(array(
    "mail"=>$_POST['mail'],
    "mdp"=>$_POST['mdp'],
));
var_dump($_POST);
echo $direction->getMail();
echo $direction->getMdp();
if($direction->connexion($bdd)){
    $_SESSION['id_direction'] = $direction->getId_direction();
    header("Location: ../../../vue/accueilDirection.php");
} else {

    //header("Location: ../../../index.php");
}
