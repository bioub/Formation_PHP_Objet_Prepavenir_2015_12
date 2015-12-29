<?php

class Film
{

    protected $titre;
    protected $dateSortie;
    protected $realisateur;

    /**
     *
     * @var Acteur[] 
     */
    protected $acteurs = [];

    /**
     *
     * @var Critique[] 
     */
    protected $critiques = [];

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    public function getRealisateur()
    {
        return $this->realisateur;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;
        return $this;
    }

    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;
        return $this;
    }

    public function getActeurs()
    {
        return $this->acteurs;
    }

    public function getCritiques()
    {
        return $this->critiques;
    }
    
    public function addActeur(Acteur $acteur)
    {
        $this->acteurs[] = $acteur;
        return $this;
    }
    
    public function addCritique(Critique $critique)
    {
        $this->critiques[] = $critique;
        return $this;
    }

}
