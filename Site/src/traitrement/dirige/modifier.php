<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Php_Table.php";
require_once "../../modele/compte/Compte.php";
require_once "../../modele/Dirige.php";

$bdd = new BDD();
$dirige = new Dirige(array(
    "ref_professeur" => $_POST['ref_professeur'],
    "ref_cours"=> $_POST['ref_cours']
));
$dirige->modifier($bdd);
header("Location: ../../../index.php");