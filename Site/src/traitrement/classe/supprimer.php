<?php
require_once "../../bdd/BDD.php";
require_once "../../modele/Classe.php";

$bdd = new BDD();
$classe = new Classe(array(
    "id_classe"=>$_POST['id_classe'],
));

$classe->supprimer($bdd);
header("Location: $_SERVER[HTTP_REFERER]");