<?php

class Societe
{

    protected $nom;
    protected $ville;

    public function getNom()
    {
        return $this->nom;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }

}
