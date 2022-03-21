<?php

class Cours extends Php_Table {
    private $id_cours;
    private $date;
    private $heure_debut;
    private $heure_fin;
    private $ref_classe;
    private $ref_matiere;

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
        $req = $bdd->getBdd()->prepare("INSERT INTO cours(date, heure_debut, heure_fin, ref_classe, ref_matiere) VALUES (:date, :heure_debut, :heure_fin, :ref_classe, :ref_matiere);");
        $req->execute(array(
            "date"=>$this->getDate(),
            "heure_debut"=>$this->getHeure_debut(),
            "heure_fin"=>$this->getHeure_fin(),
            "ref_classe"=>$this->getRef_classe(),
            "ref_matiere"=>$this->getRef_matiere(),
        ));
    }

    public function afficher(BDD $bdd){
        $req = $bdd->getBdd()->prepare("SELECT * FROM cours;");
        $req->execute();
        return $req->fetchAll();
    }

    public function modifier(BDD $bdd){
        $req = $bdd->getBdd()->prepare("UPDATE cours SET date = :date, heure_debut = :heure_debut, heure_fin = :heure_fin, ref_classe = :ref_classe, ref_matiere = :ref_matiere WHERE id_cours = :id_cours;");
        $req->execute(array(
            "id_cours"=>$this->getId_cours(),
            "date"=>$this->getDate(),
            "heure_debut"=>$this->getHeure_debut(),
            "heure_fin"=>$this->getHeure_fin(),
            "ref_classe"=>$this->getRef_classe(),
            "ref_matiere"=>$this->getRef_matiere(),
        ));
    }

    public function supprimer(BDD $bdd){
        $req = $bdd->getBdd()->prepare("DELETE FROM cours WHERE id_cours = :id_cours");
        $req->execute(array(
            "id_cours"=>$this->getId_cours()
        ));
    }

    /* @return mixed */
    public function getId_cours(){
        return $this->id_cours;
    }

    /* @param mixed $id_cours */
    public function setId_cours($id_cours){
        $this->id_cours = $id_cours;
    }

    /* @return mixed */
    public function getDate(){
        return $this->date;
    }

    /* @param mixed $date */
    public function setDate($date){
        $this->date = $date;
    }

    /* @return mixed */
    public function getHeure_debut(){
        return $this->heure_debut;
    }

    /* @param mixed $heure_debut */
    public function setHeure_debut($heure_debut){
        $this->heure_debut = $heure_debut;
    }

    /* @return mixed */
    public function getHeure_fin(){
        return $this->heure_fin;
    }

    /* @param mixed $heure_fin */
    public function setHeure_fin($heure_fin){
        $this->heure_fin = $heure_fin;
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