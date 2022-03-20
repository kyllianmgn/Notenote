<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Matiere.php";

$bdd = new BDD();
$matiere = new Matiere(array(
    "nom"=>$_POST['nom'],
));

$matiere->ajout($bdd);
header("Location: ../../index.php");