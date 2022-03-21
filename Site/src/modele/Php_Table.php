<?php

abstract class Php_Table {


    abstract public function ajout(BDD $bdd);
    abstract public function afficher(BDD $bdd);
    abstract public function modifier(BDD $bdd);
    abstract public function supprimer(BDD $bdd);
}