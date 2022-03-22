<?php

abstract class Compte extends Php_Table {
    private $nom;
    private $prenom;
    private $mail;
    private $mdp;

    abstract public function connexion(BDD $bdd);
    abstract public function mdpoublie(BDD $bdd);

    /* @return mixed */
    public function getNom(){
        return $this->nom;
    }

    /* @param mixed $nom */
    public function setNom($nom){
        $this->nom = $nom;
    }

    /* @return mixed */
    public function getPrenom(){
        return $this->prenom;
    }

    /* @param mixed $prenom */
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    /* @return mixed */
    public function getMail(){
        return $this->mail;
    }

    /* @param mixed $mail */
    public function setMail($mail){
        $this->mail = $mail;
    }

    /* @return mixed */
    public function getMdp(){
        return $this->mdp;
    }

    /* @param mixed $mdp */
    public function setMdp($mdp){
        $this->mdp = $mdp;
    }
}