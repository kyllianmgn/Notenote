<?php
class BDD{
    private $bdd;

    public function __construct(){
        $this->bdd = new PDO("mysql:host=localhost;dbname=ku_notenote;charset=utf8","ku_notenote","ku_notenote");
    }

    /* @return PDO */
    public function getBdd(){
        return $this->bdd;
    }
}