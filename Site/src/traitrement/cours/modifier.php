<?php
require_once "../../bdd/BDD.php";
require_once '../../modele/Php_Table.php';
require_once '../../modele/compte/Compte.php';
require_once "../../modele/Cours.php";

$bdd = new BDD();
$cours = new Cours(array(
    "id_cours"=>$_POST['id_cours'],
    "heure_debut"=>$_POST['heure_debut'],
    "heure_fin"=>$_POST['heure_fin'],
    "ref_classe"=>$_POST['ref_classe'],
    "ref_matiere"=>$_POST['ref_matiere'],
));

$cours->modifier($bdd);
header("Location: ../../index.php");