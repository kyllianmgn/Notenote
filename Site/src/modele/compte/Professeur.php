<?php

class Professeur extends Compte {
    private $id_professeur;

    public function ajout(BDD $bdd){
        $req = $bdd->getBdd()->prepare("INSERT INTO professeur(nom, prenom, mail, mdp) VALUES (:nom,:prenom,:mail,:mdp);");
        $req->execute(array(
            "nom"=>$this->getNom(),
            "prenom"=>$this->getPrenom(),
            "mail"=>$this->getMail(),
            "mdp"=>$this->getMdp(),
        ));
    }

    public function afficher(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM professeur;");
        $req->execute();
        return $req->fetchAll();
    }

    public function afficherById(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM professeur WHERE id_professeur=:id_professeur;");
        $req->execute(array(
            "id_professeur"=>$this->getId_professeur()
        ));
        return $req->fetch();
    }

    public function modifier(BDD $bdd){
        $req = $bdd->getBdd()->prepare("UPDATE professeur SET nom = :nom, prenom = :prenom, mail = :mail, mdp = :mdp WHERE id_professeur = :id_professeur;");
        $req->execute(array(
            "id_professeur"=>$this->getId_professeur(),
            "nom"=>$this->getNom(),
            "prenom"=>$this->getPrenom(),
            "mail"=>$this->getMail(),
            "mdp"=>$this->getMdp(),
        ));
    }

    public function supprimer(BDD $bdd){
        $req = $bdd->getBdd()->prepare("DELETE FROM direction WHERE id_direction = :id_professeur");
        $req->execute(array(
            "id_professeur"=>$this->getId_professeur()
        ));
    }

    public function connexion(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM professeur WHERE mail = :mail AND mdp = :mdp;");
        $req->execute(array(
            "mail"=>$this->getMail(),
            "mdp"=>$this->getMdp(),
        ));
        $res = $req->fetch();
        if($res){
            $this->setId_professeur($res['id_professeur']);
            $this->setNom($res['nom']);
            $this->setPrenom($res['prenom']);
            $this->setMail($res['mail']);
            $this->setMdp($res['mdp']);
            return true;
        } else {
            return false;
        }
    }

    public function rechercher(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM professeur WHERE id_professeur = :id_professeur;");
        $req->execute(array(
            "id_professeur"=>$this->getId_professeur()
        ));
        return $req->fetch();
    }

    /* @return mixed */
    public function getId_professeur(){
        return $this->id_professeur;
    }

    /* @param mixed $id_professeur */
    public function setId_professeur($id_professeur){
        $this->id_professeur = $id_professeur;
    }
}