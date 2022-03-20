<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Direction.php";

$bdd = new BDD();
$direction = new Direction(array(
    "nom"=>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "mail"=>$_POST['mail'],
    "mdp"=>$_POST["mdp"],
));

$direction->ajout($bdd);
header("Location: ../../index.php");