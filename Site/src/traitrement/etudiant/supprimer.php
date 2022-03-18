<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Etudiant.php";

$bdd = new BDD();
$etudiant = new Etudiant(array(
    "id_etudiant"=>$_POST['id_etudiant'],
));

$etudiant->supprimer($bdd);
header("Location: $_SERVER[HTTP_REFERER]");