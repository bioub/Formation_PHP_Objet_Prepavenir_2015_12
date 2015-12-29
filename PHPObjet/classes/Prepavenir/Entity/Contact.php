<?php

class Contact
{

    protected $prenom;
    protected $nom;
    protected $email;
    protected $telephone;

    /**
     *
     * @var Societe 
     */
    protected $societe;

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getSociete()
    {
        return $this->societe;
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

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function setSociete(Societe $societe)
    {
        $this->societe = $societe;
        return $this;
    }

}
