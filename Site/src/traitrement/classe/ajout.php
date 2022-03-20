<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Classe.php";

$bdd = new BDD();
$classe = new Classe(array(
    "nom"=>$_POST['nom'],
));

$classe->ajout($bdd);
header("Location: ../../index.php");