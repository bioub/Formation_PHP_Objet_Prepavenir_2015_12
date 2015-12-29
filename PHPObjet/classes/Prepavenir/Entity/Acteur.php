<?php

class Acteur
{

    protected $prenom;
    protected $nom;

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    
    public function __toString() {
        return "$this->prenom $this->nom";
    }
}
