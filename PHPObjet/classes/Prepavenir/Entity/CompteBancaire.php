<?php


class CompteBancaire
{
    protected $proprietaire;
    protected $solde;
    protected $type;
    
    public function __construct($proprietaire, $solde, $type)
    {
        $this->proprietaire = $proprietaire;
        $this->solde = $solde;
        $this->type = $type;
    }

    public function afficherInfos()
    {
        return "$this->type de $this->proprietaire, solde : $this->solde euros";
    }
    
    public function crediter($montant)
    {
        $this->solde = $this->solde + $montant;
        // peut s'écrire $this->solde += $montant;
    }
    
    public function debiter($montant)
    {
        $reste = $this->solde - $montant;
        $this->solde = $reste;
    }
}
