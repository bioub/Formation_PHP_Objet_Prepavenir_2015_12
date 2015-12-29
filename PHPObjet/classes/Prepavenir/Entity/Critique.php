<?php

class Critique
{

    protected $journal;
    protected $note;
    protected $texte;

    public function getJournal()
    {
        return $this->journal;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function getTexte()
    {
        return $this->texte;
    }

    public function setJournal($journal)
    {
        $this->journal = $journal;
        return $this;
    }

    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    public function setTexte($texte)
    {
        $this->texte = $texte;
        return $this;
    }

}
