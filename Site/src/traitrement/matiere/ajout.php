<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Php_Table.php";
require_once "../../modele/compte/Compte.php";
require_once "../../modele/Matiere.php";

$bdd = new BDD();
$matiere = new Matiere(array(
    "nom"=>$_POST['nom'],
));

$matiere->ajout($bdd);
header("Location: $_SERVER[HTTP_REFERER]");