<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Devoir.php";

$bdd = new BDD();
$devoir = new Devoir(array(
    "description"=>$_POST['description'],
    "ref_professeur"=>$_POST['ref_professeur'],
    "ref_classe"=>$_POST['ref_classe'],
    "ref_matiere"=>$_POST['ref_matiere']
));

$devoir->ajout($bdd);
header("Location: ../../index.php");