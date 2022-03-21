<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Php_Table.php";
require_once "../../modele/compte/Compte.php";
require_once "../../modele/Classe.php";

$bdd = new BDD();
$classe = new Classe(array(
    "id_classe"=>$_POST['id_classe'],
    "nom"=>$_POST['nom'],
));

$classe->modifier($bdd);
header("Location: ../../../index.php");