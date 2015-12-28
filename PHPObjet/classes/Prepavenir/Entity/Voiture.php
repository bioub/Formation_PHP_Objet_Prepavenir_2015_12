<?php


class Voiture
{
    // protected mot clé de visibilité
    // public : visible tous le temps
    // protected : visible dans la classes et les classes
    // liées par héritage
    // private : visible uniquement dans la classe
    protected $marque;
    protected $modele;
    
    public function __construct($marque, $modele) {
        $this->marque = $marque;
        $this->modele = $modele;
    }
    
    public function afficherInfos() {
        return "Ceci est une voiture $this->marque $this->modele";
    }
}
