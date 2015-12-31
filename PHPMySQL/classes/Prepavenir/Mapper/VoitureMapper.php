<?php

namespace Prepavenir\Mapper;

use PDO;
use Prepavenir\Entity\Voiture;

class VoitureMapper
{

    /**
     *
     * @var PDO
     */
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Fully Qualified Class Name (FQCN ou FQN)
     * @return Voiture[]
     */
    public function findAll()
    {
        $sql = "SELECT id, marque, modele "
                . "FROM voiture "
                . "ORDER BY marque, modele "
                . "LIMIT 100";

        $stmt = $this->pdo->query($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Voiture::class);
        
        return $stmt->fetchAll();
    }

}
