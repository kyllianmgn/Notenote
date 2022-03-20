<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Professeur.php";

$bdd = new BDD();
$professeur = new Professeur(array(
    "nom"=>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "mail"=>$_POST['mail'],
    "mdp"=>$_POST["mdp"],
));

$professeur->ajout($bdd);
header("Location: ../../index.php");