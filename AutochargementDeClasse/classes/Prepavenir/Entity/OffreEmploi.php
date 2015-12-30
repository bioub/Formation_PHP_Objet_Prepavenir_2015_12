<?php

namespace Prepavenir\Entity;

class OffreEmploi
{

    protected $titre;
    protected $datePublication;
    protected $annonce;

    /**
     *
     * @var Societe
     */
    protected $societe;

    /**
     *
     * @var Candidat[]
     */
    protected $candidats = [];

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDatePublication()
    {
        return $this->datePublication;
    }

    public function getAnnonce()
    {
        return $this->annonce;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;
        return $this;
    }

    public function setAnnonce($annonce)
    {
        $this->annonce = $annonce;
        return $this;
    }

    public function getSociete()
    {
        return $this->societe;
    }

    public function setSociete(Societe $societe)
    {
        $this->societe = $societe;
        return $this;
    }

    public function getCandidats()
    {
        return $this->candidats;
    }
    
    public function addCandidat(Candidat $candidat)
    {
        $this->candidats[] = $candidat;
        return $this;
    }

}
