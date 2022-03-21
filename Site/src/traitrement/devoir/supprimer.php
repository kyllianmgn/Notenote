<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Devoir.php";

$bdd = new BDD();
$devoir = new Devoir(array(
    "id_devoir"=>$_POST['id_devoir'],
));

$devoir->supprimer($bdd);
header("Location: $_SERVER[HTTP_REFERER]");