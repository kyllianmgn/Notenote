<?php
session_start();
require_once "../../bdd/BDD.php";
require_once "../../modele/compte/Direction.php";

$bdd = new BDD();
$direction = new Direction(array(
    "mail"=>$_POST['mail'],
    "mdp"=>$_POST['mdp'],
));

if($direction->connexion($bdd)){
    $_SESSION['id_direction'] = $direction->getId_direction();
    header("Location: ../../vue/accueilDirection.php");
} else {
    header("Location: ../../index.php");
}
