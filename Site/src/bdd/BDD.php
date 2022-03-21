<?php
class BDD{
    private $bdd;

    public function __construct(){
        $this->bdd = new PDO("mysql:host=localhost;bdname=ku_notenote;charset=utf8","root","");
    }

    /* @return PDO */
    public function getBdd(){
        return $this->bdd;
    }
}