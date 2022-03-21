<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Php_Table.php";
require_once "../../modele/compte/Compte.php";
require_once "../../modele/compte/Etudiant.php";

$bdd = new BDD();
$etudiant = new Etudiant(array(
    "nom"=>$_POST['nom'],
    "prenom"=>$_POST['prenom'],
    "mail"=>$_POST['mail'],
    "mdp"=>$_POST['mdp'],
    "ref_classe"=>$_POST['ref_classe'],
));

$etudiant->ajout($bdd);
header("Location: $_SERVER[HTTP_REFERER]");