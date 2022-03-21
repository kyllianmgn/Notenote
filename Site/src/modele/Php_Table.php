<?php

abstract class Php_Table {

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if (method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    abstract public function ajout(BDD $bdd);
    abstract public function afficher(BDD $bdd);
    abstract public function modifier(BDD $bdd);
    abstract public function supprimer(BDD $bdd);
}