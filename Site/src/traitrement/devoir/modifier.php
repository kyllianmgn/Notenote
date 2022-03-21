<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Php_Table.php";
require_once "../../modele/compte/Compte.php";
require_once "../../modele/Devoir.php";

$bdd = new BDD();
$devoir = new Devoir(array(
    "id_devoir"=>$_POST['id_devoir'],
    "description"=>$_POST['description'],
    "ref_professeur"=>$_POST['ref_professeur'],
    "ref_classe"=>$_POST['ref_classe'],
    "ref_matiere"=>$_POST['ref_matiere']
));

$devoir->modifier($bdd);
header("Location: ../../../index.php");