<?php

class Devoir extends Php_Table {
    private $id_devoir;
    private $description;
    private $ref_professeur;
    private $ref_classe;
    private $ref_matiere;

    public function ajout(BDD $bdd){
        $req = $bdd->getBdd()->prepare("INSERT INTO devoir(description, ref_professeur, ref_classe, ref_matiere) VALUES (:description, :ref_professeur, :ref_classe, :ref_matiere);");
        $req->execute(array(
            "description"=>$this->getDescription(),
            "ref_professeur"=>$this->getRef_professeur(),
            "ref_classe"=>$this->getRef_classe(),
            "ref_matiere"=>$this->getRef_matiere()
        ));
    }

    public function afficher(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM devoir;");
        $req->execute();
        return $req->fetchAll();
    }

    public function modifier(BDD $bdd){
        $req = $bdd->getBdd()->prepare("UPDATE devoir SET description = :description, ref_professeur = :ref_professeur, ref_classe = :ref_classe, ref_matiere = :ref_matiere WHERE id_devoir = :id_devoir;");
        $req->execute(array(
            "id_devoir"=>$this->getId_devoir(),
            "description"=>$this->getDescription(),
            "ref_professeur"=>$this->getRef_professeur(),
            "ref_classe"=>$this->getRef_classe(),
            "ref_matiere"=>$this->getRef_matiere()
        ));
    }

    public function supprimer(BDD $bdd){
        $req = $bdd->getBdd()->prepare("DELETE FROM devoir WHERE id_devoir = :id_devoir");
        $req->execute(array(
            "id_devoir"=>$this->getId_devoir()
        ));
    }

    /* @return mixed */
    public function getId_devoir(){
        return $this->id_devoir;
    }

    /* @param mixed $id_devoir */
    public function setId_devoir($id_devoir){
        $this->id_devoir = $id_devoir;
    }

    /* @return mixed */
    public function getDescription(){
        return $this->description;
    }

    /* @param mixed $description */
    public function setDescription($description){
        $this->description = $description;
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
    public function getRef_classe(){
        return $this->ref_classe;
    }

    /* @param mixed $ref_classe */
    public function setRef_classe($ref_classe){
        $this->ref_classe = $ref_classe;
    }

    /* @return mixed */
    public function getRef_matiere(){
        return $this->ref_matiere;
    }

    /* @param mixed $ref_matiere */
    public function setRef_matiere($ref_matiere){
        $this->ref_matiere = $ref_matiere;
    }
}