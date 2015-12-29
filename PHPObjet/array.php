<?php

$prenoms = ['Jean', 'Eric', 'Paul'];
echo implode(', ', $prenoms);

require_once './classes/Prepavenir/Entity/Acteur.php';

$acteurs = [];
$acteur = new Acteur();
$acteur->setPrenom('Christian')
       ->setNom('Bale');

$acteurs[] = $acteur;

$acteur = new Acteur();
$acteur->setPrenom('Steve')
       ->setNom('Carell');

$acteurs[] = $acteur;

$acteur = new Acteur();
$acteur->setPrenom('Ryan')
       ->setNom('Gosling');

$acteurs[] = $acteur;


echo implode(', ', $acteurs);