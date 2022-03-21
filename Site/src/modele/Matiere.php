<?php

class Matiere extends Php_Table {
    private $id_matiere;
    private $nom;

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
        $req = $bdd->getBdd()->prepare("INSERT INTO matiere(nom) VALUES (:nom);");
        $req->execute(array(
            "nom"=>$this->getNom(),
        ));
    }

    public function afficher(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM matiere;");
        $req->execute();
        return $req->fetchAll();
    }

    public function afficherById(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM matiere WHERE id_matiere=:id_matiere");
        $req->execute(array(
            "id_matiere"=>$this->getId_matiere()
        ));
        return $req->fetch();
    }

    public function modifier(BDD $bdd){
        $req = $bdd->getBdd()->prepare("UPDATE matiere SET nom = :nom WHERE id_matiere = :id_matiere;");
        $req->execute(array(
            "id_matiere"=>$this->getId_matiere(),
            "nom"=>$this->getNom(),
        ));
    }

    public function supprimer(BDD $bdd){
        $req = $bdd->getBdd()->prepare("DELETE FROM matiere WHERE id_matiere = :id_matiere");
        $req->execute(array(
            "id_matiere"=>$this->getId_matiere()
        ));
    }

    /* @return mixed */
    public function getId_matiere(){
        return $this->id_matiere;
    }

    /* @param mixed $id_matiere */
    public function setId_matiere($id_matiere){
        $this->id_matiere = $id_matiere;
    }

    /* @return mixed */
    public function getNom(){
        return $this->nom;
    }

    /* @param mixed $nom */
    public function setNom($nom){
        $this->nom = $nom;
    }
}