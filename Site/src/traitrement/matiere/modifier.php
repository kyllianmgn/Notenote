<?php
require_once "../../bdd/BDD.php";
require_once '../../modele/Php_Table.php';
require_once '../../modele/compte/Compte.php';
require_once "../../modele/Matiere.php";

$bdd = new BDD();
$matiere = new Matiere(array(
    "id_matiere"=>$_POST['id_matiere'],
    "nom"=>$_POST['nom'],
));

$matiere->modifier($bdd);
header("Location: ../../index.php");