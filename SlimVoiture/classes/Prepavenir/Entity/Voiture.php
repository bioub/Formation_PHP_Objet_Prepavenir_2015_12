<?php

namespace Prepavenir\Entity;

class Voiture
{

    protected $id;
    protected $marque;
    protected $modele;

    public function getId()
    {
        return $this->id;
    }

    public function getMarque()
    {
        return $this->marque;
    }

    public function getModele()
    {
        return $this->modele;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
        return $this;
    }

    public function setModele($modele)
    {
        $this->modele = $modele;
        return $this;
    }

}
