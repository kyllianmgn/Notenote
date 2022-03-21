<?php
session_start();
require_once "../../bdd/BDD.php";
require_once "../../modele/compte/Professeur.php";

$bdd = new BDD();
$professeur = new Professeur(array(
    "id_professeur"=>$_SESSION['id_professeur'],
    "nom"=>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "mail"=>$_POST['mail'],
    "mdp"=>$_POST['mdp'],
));

$professeur->modifier($bdd);
header("Location: ../../index.php");