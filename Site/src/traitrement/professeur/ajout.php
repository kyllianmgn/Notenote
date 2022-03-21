<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Php_Table.php";
require_once "../../modele/compte/Compte.php";
require_once "../../modele/compte/Professeur.php";

$bdd = new BDD();
$professeur = new Professeur(array(
    "nom"=>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "mail"=>$_POST['mail'],
    "mdp"=>$_POST['mdp'],
));

$professeur->ajout($bdd);
header("Location: $_SERVER[HTTP_REFERER]");