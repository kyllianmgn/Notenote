<?php

abstract class Compte extends Php_Table {
    private $nom;
    private $prenom;
    private $mail;
    private $mdp;

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


    abstract public function connexion(BDD $bdd);

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