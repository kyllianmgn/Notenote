<?php
session_start();
require_once "../../bdd/BDD.php";
require_once "../../modele/Php_Table.php";
require_once "../../modele/compte/Compte.php";
require_once "../../modele/compte/Direction.php";

$bdd = new BDD();
$direction = new Direction(array(
    "id_direction"=>$_SESSION['id_direction'],
    "nom"=>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "mail"=>$_POST['mail'],
    "mdp"=>$_POST['mdp'],
));

$direction->modifier($bdd);
header("Location: ../../../index.php");