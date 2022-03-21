<?php
session_start();
require_once "../../bdd/BDD.php";
require_once '../../modele/Php_Table.php';
require_once '../../modele/compte/Compte.php';
require_once "../../modele/compte/Etudiant.php";

$bdd = new BDD();
$etudiant = new Etudiant(array(
    "mail"=>$_POST['mail'],
    "mdp"=>$_POST['mdp'],
));

if($etudiant->connexion($bdd)){
    $_SESSION['id_etudiant'] = $etudiant->getId_etudiant();
    header("Location: ../../vue/accueilEleve.php");
} else {
    header("Location: ../../../index.php");
}
