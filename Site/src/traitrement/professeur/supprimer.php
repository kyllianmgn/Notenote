<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Php_Table.php";
require_once "../../modele/compte/Compte.php";
require_once "../../modele/compte/Direction.php";

$bdd = new BDD();
$direction = new Direction(array(
    "id_direction"=>$_POST['id_direction'],
));

$direction->supprimer($bdd);
header("Location: $_SERVER[HTTP_REFERER]");