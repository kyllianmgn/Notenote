<?php

class Direction extends Compte {
    private $id_direction;


    public function ajout(BDD $bdd){
        $req = $bdd->getBdd()->prepare("INSERT INTO direction(nom, prenom, mail, mdp) VALUES (:nom,:prenom,:mail,:mdp);");
        $req->execute(array(
            "nom"=>$this->getNom(),
            "prenom"=>$this->getPrenom(),
            "mail"=>$this->getMail(),
            "mdp"=>$this->getMdp(),
        ));
    }

    public function afficher(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM direction;");
        $req->execute();
        return $req->fetchAll();
    }

    public function modifier(BDD $bdd){
        $req = $bdd->getBdd()->prepare("UPDATE direction SET nom = :nom, prenom = :prenom, mail = :mail, mdp = :mdp WHERE id_direction = :id_direction;");
        $req->execute(array(
            "id_direction"=>$this->getId_direction(),
            "nom"=>$this->getNom(),
            "prenom"=>$this->getPrenom(),
            "mail"=>$this->getMail(),
            "mdp"=>$this->getMdp(),
        ));
    }

    public function supprimer(BDD $bdd){
        $req = $bdd->getBdd()->prepare("DELETE FROM direction WHERE id_direction = :id_direction");
        $req->execute(array(
            "id_direction"=>$this->getId_direction()
        ));
    }

    public function connexion(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM direction WHERE mail = :mail AND mdp = :mdp");
        $req->execute(array(
            "mail"=>$this->getMail(),
            "mdp"=>$this->getMdp()
        ));
        $res = $req->fetch();
        var_dump($res);
        if($res){
            $this->setId_direction($res['id_direction']);
            $this->setNom($res['nom']);
            $this->setPrenom($res['prenom']);
            $this->setMail($res['mail']);
            $this->setMdp($res['mdp']);
            return true;
        } else {
            return false;
        }
    }

    /* @return mixed */
    public function getId_direction(){
        return $this->id_direction;
    }

    /* @param mixed $id_direction */
    public function setId_direction($id_direction){
        $this->id_direction = $id_direction;
    }
}