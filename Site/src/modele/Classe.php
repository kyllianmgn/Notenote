<?php

class Classe extends Php_Table {
    private $id_classe;
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
        $req = $bdd->getBdd()->prepare("INSERT INTO classe(nom) VALUES (:nom);");
        $req->execute(array(
            "nom"=>$this->getNom(),
        ));
    }

    public function afficher(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM classe;");
        $req->execute();
        return $req->fetchAll();
    }

    public function afficherById(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM classe WHERE id_classe=:id_classe");
        $req->execute(array(
            "id_classe"=>$this->getId_classe()
        ));
        return $req->fetch();
    }

    public function modifier(BDD $bdd){
        $req = $bdd->getBdd()->prepare("UPDATE classe SET nom = :nom WHERE id_classe = :id_direction;");
        $req->execute(array(
            "id_classe"=>$this->getId_classe(),
            "nom"=>$this->getNom(),
        ));
    }

    public function supprimer(BDD $bdd){
        $req = $bdd->getBdd()->prepare("DELETE FROM classe WHERE id_classe = :id_classe");
        $req->execute(array(
            "id_classe"=>$this->getId_classe()
        ));
    }

    /* @return mixed */
    public function getId_classe(){
        return $this->id_classe;
    }

    /* @param mixed $id_classe */
    public function setId_classe($id_classe){
        $this->id_classe = $id_classe;
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