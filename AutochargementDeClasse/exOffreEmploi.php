<?php
require_once './includes/autoload.php';

use Prepavenir\Entity\Candidat;
use Prepavenir\Entity\OffreEmploi;
use Prepavenir\Entity\Societe;

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