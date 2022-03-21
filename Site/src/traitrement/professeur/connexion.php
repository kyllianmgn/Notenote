<?php
session_start();
require_once "../../bdd/BDD.php";
require_once "../../modele/compte/Professeur.php";

$bdd = new BDD();
$professeur = new Professeur(array(
    "mail"=>$_POST['mail'],
    "mdp"=>$_POST['mdp'],
));

if($professeur->connexion($bdd)){
    $_SESSION['id_professeur'] = $professeur->getId_professeur();
    header("Location: ../../vue/accueilProfesseur.php");
} else {
    header("Location: ../../index.php");
}
