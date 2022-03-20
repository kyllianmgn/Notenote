<?php

class Etudiant extends Compte {
    private $id_etudiant;
    private $ref_classe;

    public function ajout(BDD $bdd){
        $req = $bdd->getBdd()->prepare("INSERT INTO etudiant(nom, prenom, mail, mdp, ref_classe) VALUES (:nom,:prenom,:mail,:mdp,:ref_classe);");
        $req->execute(array(
            "nom"=>$this->getNom(),
            "prenom"=>$this->getPrenom(),
            "mail"=>$this->getMail(),
            "mdp"=>$this->getMdp(),
            "ref_classe"=>$this->getRef_classe(),
        ));
    }

    public function afficher(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM etudiant;");
        $req->execute();
        return $req->fetchAll();
    }

    public function modifier(BDD $bdd){
        $req = $bdd->getBdd()->prepare("UPDATE etudiant SET nom = :nom, prenom = :prenom, mail = :mail, mdp = :mdp, ref_classe = :ref_classe WHERE id_etudiant = :id_etudiant;");
        $req->execute(array(
            "id_etudiant"=>$this->getId_etudiant(),
            "nom"=>$this->getNom(),
            "prenom"=>$this->getPrenom(),
            "mail"=>$this->getMail(),
            "mdp"=>$this->getMdp(),
            "ref_classe"=>$this->getRef_classe(),
        ));
    }

    public function supprimer(BDD $bdd){
        $req = $bdd->getBdd()->prepare("DELETE FROM etudiant WHERE id_etudiant = :id_etudiant");
        $req->execute(array(
            "id_etudiant"=>$this->getId_etudiant()
        ));
    }

    public function connexion(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM etudiant WHERE mail = :mail AND mdp = :mdp;");
        $req->execute(array(
            "mail"=>$this->getMail(),
            "mdp"=>$this->getMdp(),
        ));
        $res = $req->fetch();
        if($res){
            $this->setId_etudiant($res['id_etudiant']);
            $this->setNom($res['nom']);
            $this->setPrenom($res['prenom']);
            $this->setMail($res['mail']);
            $this->setMdp($res['mdp']);
            $this->setRef_classe($res['ref_classe']);
            return true;
        } else {
            return false;
        }
    }

    /* @return mixed */
    public function getId_etudiant(){
        return $this->id_etudiant;
    }
    /* @param mixed $id_etudiant */
    public function setId_etudiant($id_etudiant){
        $this->id_etudiant = $id_etudiant;
    }
    /* @return mixed */
    public function getRef_classe(){
        return $this->ref_classe;
    }
    /* @param mixed $ref_classe */
    public function setRef_classe($ref_classe){
        $this->ref_classe = $ref_classe;
    }
}