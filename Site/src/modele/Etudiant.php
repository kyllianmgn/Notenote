<?php

class etudiant{
    private $id_etudiant;
    private $nom;
    private $prenom;
    private $mail;
    private $mdp;
    private $ref_classe;

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
        } else{
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getId_etudiant(){
        return $this->id_etudiant;
    }
    /**
     * @param mixed $id_etudiant
     */
    public function setId_etudiant($id_etudiant): void{
        $this->id_etudiant = $id_etudiant;
    }
    /**
     * @return mixed
     */
    public function getNom(){
        return $this->nom;
    }
    /**
     * @param mixed $nom
     */
    public function setNom($nom): void{
        $this->nom = $nom;
    }
    /**
     * @return mixed
     */
    public function getPrenom(){
        return $this->prenom;
    }
    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void{
        $this->prenom = $prenom;
    }
    /**
     * @return mixed
     */
    public function getMail(){
        return $this->mail;
    }
    /**
     * @param mixed $mail
     */
    public function setMail($mail): void{
        $this->mail = $mail;
    }
    /**
     * @return mixed
     */
    public function getMdp(){
        return $this->mdp;
    }
    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp): void{
        $this->mdp = $mdp;
    }
    /**
     * @return mixed
     */
    public function getRef_classe(){
        return $this->ref_classe;
    }
    /**
     * @param mixed $ref_classe
     */
    public function setRef_classe($ref_classe): void{
        $this->ref_classe = $ref_classe;
    }
}