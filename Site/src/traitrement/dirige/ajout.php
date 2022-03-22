<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Dirige.php";

$bdd = new BDD();
$dirige = new Dirige(array(
    "ref_professeur" => $_POST['ref_professeur'],
    "ref_cours"=> $_POST['ref_cours']
));

$dirige->ajout($bdd);
header("Location: $_SERVER[HTTP_REFERER]");