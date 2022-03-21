<?php

class Dirige extends Php_Table
{
    private $ref_professeur;
    private $ref_cours;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function ajout(BDD $bdd)
    {
        $req = $bdd->getBdd()->prepare("INSERT INTO dirige(ref_professeur, ref_cours) VALUES (:ref_professeur,:ref_cours);");
        $req->execute(array(
            "ref_professeur" => $this->getRefCours(),
            "ref_cours"=> $this->getRefProfesseur()
        ));
    }

    public function afficher(BDD $bdd)
    {
        $req = $bdd->getBdd()->prepare("SELECT * FROM dirige;");
        $req->execute();
        return $req->fetchAll();
    }

    public function modifier(BDD $bdd){

    }

    public function supprimer(BDD $bdd)
    {
        $req = $bdd->getBdd()->prepare("DELETE FROM dirige WHERE ref_professeur = :ref_professeur AND ref_cours=:ref_cours");
        $req->execute(array(
            "ref_professeur" => $this->getRefCours(),
            "ref_cours"=> $this->getRefProfesseur()
        ));
    }

    /**
     * @return mixed
     */
    public function getRefCours()
    {
        return $this->ref_cours;
    }

    /**
     * @return mixed
     */
    public function getRefProfesseur()
    {
        return $this->ref_professeur;
    }

    /**
     * @param mixed $ref_cours
     */
    public function setRef_Cours($ref_cours): void
    {
        $this->ref_cours = $ref_cours;
    }

    /**
     * @param mixed $ref_professeur
     */
    public function setRef_Professeur($ref_professeur): void
    {
        $this->ref_professeur = $ref_professeur;
    }
};
