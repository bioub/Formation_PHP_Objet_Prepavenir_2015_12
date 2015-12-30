<?php
/*
 * Exercice :
 * 1/ Créer les classes
 * Créer la classe OffreEmploi (titre, datePublication, annonce)
 * Créer la classe Candidat (prenom, nom)
 * 
 * 2/ Lier les classes
 * Lier la classe OffreEmploi à la classe Société (côté OffreEmploi)
 * Lier la classe OffreEmploi à la classe Candidat (côté OffreEmploi)
 * 
 * 3/ Instancier les classes avec des données exemples
 * ex : $emploi = new Emploi()...
 * 
 * 4/ Remplacer le HTML
 */

require_once './classes/Prepavenir/Entity/Candidat.php';
require_once './classes/Prepavenir/Entity/Societe.php';
require_once './classes/Prepavenir/Entity/OffreEmploi.php';

$offreEmploi = new OffreEmploi();
$offreEmploi->setTitre('Développeur Symfony')
            ->setDatePublication('28 décembre 2015')
            ->setAnnonce('Recherche développeur...');

$societe = new Societe();
$societe->setNom('Sensio Labs')
        ->setVille('Clichy');
$offreEmploi->setSociete($societe);

$candidat = new Candidat();
$candidat->setPrenom('Romain')
        ->setNom('Bohdanowicz');
$offreEmploi->addCandidat($candidat);

$candidat = new Candidat();
$candidat->setPrenom('Fradeli')
        ->setNom('Moke');
$offreEmploi->addCandidat($candidat);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Offres emploi</title>
    </head>
    <body>
        <h2><?=$offreEmploi->getTitre()?></h2>
        <p><?=$offreEmploi->getSociete()->getNom()?></p>
        <p><?=$offreEmploi->getDatePublication()?></p>
        <p><?=$offreEmploi->getAnnonce()?></p>
        <h3>Liste des candidats :</h3>
        <ul>
            <?php foreach($offreEmploi->getCandidats() as $cand) : ?>
            <li><?=$cand->getPrenom()?> <?=$cand->getNom()?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>