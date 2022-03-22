<?php

class Dirige {
    private $ref_professeur;
    private $ref_cours;

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

    public function ajout(BDD $bdd){
        $req = $bdd->getBdd()->prepare("INSERT INTO dirige(ref_professeur, ref_cours) VALUES (:ref_professeur,:ref_cours);");
        $req->execute(array(
            "ref_professeur"=>$this->getRef_cours(),
            "ref_cours"=>$this->getRef_professeur()
        ));
    }

    public function afficher(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM dirige;");
        $req->execute();
        return $req->fetchAll();
    }

    public function afficherByCours(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM dirige WHERE ref_cours = :ref_cours");
        $req->execute(array(
            "ref_cours"=>$this->getRef_cours()
        ));
        return $req->fetch();
    }

    public function afficherByProfesseur(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM dirige WHERE ref_professeur = :ref_professeur");
        $req->execute(array(
            "ref_professeur"=>$this->getRef_professeur()
        ));
        return $req->fetchAll();
    }

    public function supprimer(BDD $bdd){
        $req = $bdd->getBdd()->prepare("DELETE FROM dirige WHERE ref_professeur = :ref_professeur AND ref_cours = :ref_cours");
        $req->execute(array(
            "ref_professeur"=>$this->getRef_cours(),
            "ref_cours"=>$this->getRef_professeur()
        ));
    }

    /* @return mixed */
    public function getRef_professeur(){
        return $this->ref_professeur;
    }

    /* @param mixed $ref_professeur */
    public function setRef_professeur($ref_professeur){
        $this->ref_professeur = $ref_professeur;
    }

    /* @return mixed */
    public function getRef_cours(){
        return $this->ref_cours;
    }

    /* @param mixed $ref_cours */
    public function setRef_cours($ref_cours){
        $this->ref_cours = $ref_cours;
    }
}