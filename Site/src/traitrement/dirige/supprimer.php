<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Php_Table.php";
require_once "../../modele/compte/Compte.php";
require_once "../../modele/Matiere.php";

$bdd = new BDD();
$matiere = new Matiere(array(
    "id_matiere"=>$_POST['id_matiere'],
));

$matiere->supprimer($bdd);
header("Location: $_SERVER[HTTP_REFERER]");