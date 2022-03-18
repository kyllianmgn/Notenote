<?php
class BDD{
    private $bdd;
    /*public const BDD_ELEVE = [
        "username" => "eleve",
        "password" => "eleve"
    ];
    public const BDD_PROF = [
        "username" => "prof",
        "password" => "prof"
    ];
    public const BDD_DIREC = [
        "username" => "direc",
        "password" => "direc"
    ];
    public const BDD_WRITE = [
        "username" => "write_note",
        "password" => "write_note"
    ];
    public const BDD_READ = [
        "username" => "read_note",
        "password" => "read_note"
    ];*/

    public function __construct(){
        $this->bdd = new PDO("mysql:host=localhost;bdname=ku_notenote;charset=utf8","root","");
    }

    /**
     * @return PDO
     */
    public function getBdd(): PDO{
        return $this->bdd;
    }
}