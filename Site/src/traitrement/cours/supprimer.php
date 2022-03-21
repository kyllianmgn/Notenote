<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Php_Table.php";
require_once "../../modele/compte/Compte.php";
require_once "../../modele/Cours.php";

$bdd = new BDD();
$cours = new Cours(array(
    "id_cours"=>$_POST['id_cours'],
));

$cours->supprimer($bdd);
header("Location: $_SERVER[HTTP_REFERER]");