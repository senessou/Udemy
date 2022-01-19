<?php

class Personnage {

    //ATTRIBUT 
    private $_force = 40;
    private $_classe = "Plombier";
    private $_couleurCasquette = "rouge";
    private $vie = 100;
    private $nom = "";

    //CONSTRUCTEUR
    public function __construct($force, $couleur) {
        $this->setForce($force);   
        $this->setCouleurClass($couleur);
    }

    //METHODE

    public function getForce() {
        return $this->_force;
    }

    public function setForce($force) {
        $this->_force = $force;
    }

    public function getCouleurClass() {
        return $this->_couleurCasquette;
    }

    public function setCouleurClass($couleur) {
        $this->_couleurCasquette = $couleur;
    }

    public function getclass() {
        return $this->_classe;
    }

    public function getInfo() {
        return "Ce personnage a une force de " .$this->_force. " est de classe " .$this->_classe. " a une casquette de couleur ".$this->_couleurCasquette;
    }
}

$mario = new Personnage(45, "rouge");

$luigi = new Personnage(50, "verte");

echo $mario->getInfo();

echo $luigi->getInfo();
