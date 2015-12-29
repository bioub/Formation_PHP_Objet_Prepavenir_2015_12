<?php

/* 
 * Exercice : Créer un page film du type :
 * http://www.allocine.fr/film/fichefilm_gen_cfilm=215097.html
 * 
 * 1 - Commencer en HTML (même très basique) 
 * à faire la maquette avec du faux-texte
 * 
 * 2 - Créer les classes
 * 
 * 3 classes :
 * - Film (titre, année, nom du réalisateur)
 * - Acteur (prenom, nom)
 * - Critique (journal, note, texte)
 * 
 * Uniquement dans Film ajouter le lien
 * vers Acteur (réfléchir aux cardinalité)
 * et Critique
 * 
 * 3 - Instancier les classes (créer les objets)
 * avec des exemples et remplacer le faux-texte
 * par les appels aux getters
 */

require_once './classes/Prepavenir/Entity/Acteur.php';
require_once './classes/Prepavenir/Entity/Critique.php';
require_once './classes/Prepavenir/Entity/Film.php';

$film = new Film();
$film->setTitre('The Big Short : le Casse du siècle')
     ->setDateSortie('23 décembre 2015')
     ->setRealisateur('Adam McKay');

$acteur = new Acteur();
$acteur->setPrenom('Christian')
       ->setNom('Bale');

$film->addActeur($acteur);

$acteur = new Acteur();
$acteur->setPrenom('Steve')
       ->setNom('Carell');

$film->addActeur($acteur);

$acteur = new Acteur();
$acteur->setPrenom('Ryan')
       ->setNom('Gosling');

$film->addActeur($acteur);

$critique = new Critique();
$critique->setJournal('20 minutes')
        ->setNote(4)
        ->setTexte('Dans "The Big Short - Le Casse du siècle", Adam McKay revient sur la crise des subprimes qu’il parvient à rendre lumineuse grâce à ce film vachard et brillamment interprété.');

$film->addCritique($critique);

$critique = new Critique();
$critique->setJournal('Télérama')
        ->setNote(2)
        ->setTexte('Cette histoire véridique, issue du livre-enquête Le Casse du siècle, de Michael Lewis, balance entre farce et désastre sombre. Venu de la comédie loufoque (Ricky Bobby, Roi du circuit), le réalisateur ne renonce pas à divertir, mais il veut, en même temps, nous éclairer.');

$film->addCritique($critique);
?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <h2><?=$film->getTitre()?></h2>
        <table>
            <tr>
                <th>Date de sortie</th>
                <td><?=$film->getDateSortie()?></td>
            </tr>
            <tr>
                <th>Réalisé par</th>
                <td><?=$film->getRealisateur()?></td>
            </tr>
            <tr>
                <th>Avec</th>
<!--                <td>
                    <?php $premierActeur = true; ?>
                    <?php foreach($film->getActeurs() as $act) : ?>
                      <?php if (!$premierActeur) :?>
                        ,
                      <?php endif; ?>
                      <?php $premierActeur = false; ?>
                      <?=$act->getPrenom()?> <?=$act->getNom()?>
                    <?php endforeach; ?>
                </td>-->
                <td><?=implode(', ', $film->getActeurs())?></td>
            </tr>
        </table>
        
        <h3>Critiques</h3>
        
        <?php foreach ($film->getCritiques() as $crit) : ?>
        <div>
            <h4><?=$crit->getJournal()?></h4>
            <p>
                Note : <?=$crit->getNote()?>/5<br>
                <?=$crit->getTexte()?>
            </p>
        </div>
        <?php endforeach; ?>

    </body>
</html>
