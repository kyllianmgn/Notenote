<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Cours.php";

$bdd = new BDD();
$cours = new Cours(array(
    "date"=>$_POST['date'],
    "heure_debut"=>$_POST['heure_debut'],
    "heure_fin"=>$_POST['heure_fin'],
    "ref_classe"=>$_POST['ref_classe'],
    "ref_matiere"=>$_POST['ref_matiere'],
));

$cours->ajout($bdd);
header("Location: ../../index.php");