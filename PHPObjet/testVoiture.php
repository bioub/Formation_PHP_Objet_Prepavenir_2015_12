<?php

// Exemple 1 (sans objet)
// 2 variables $marque et $modele
// 1 fonction afficherInfos qui affiche les infos
// de la voiture

$marque1 = 'Renault';
$modele1 = 'Clio';

$marque2 = 'Peugeot';
$modele2 = '208';

function afficherInfos($marque, $modele) {
    return "Ceci est une voiture $marque $modele";
}

echo afficherInfos($marque1, $modele1) . '<br>';
echo afficherInfos($marque2, $modele2) . '<br>';

// Exemple 2 (avec objet)
// Intérêts :
// - réutilisable (pas de copier/coller)
// - limiter les risques de conflit de noms
// - plus besoin des paramètres $marque, $modele
// - lisibilité (plus agréable à lire)
// dans la fonction afficherInfos
// Inconvénients :
// - inclure la classe, peut être compliqué avec 400 classes
// et des classes qui dépendent les unes des autres
// - savoir créer les classes (concepts en plus à apprendre)
// - plus long à écrire (pas adapté à un programme d'une
// dizaine de ligne)

require_once './classes/Prepavenir/Entity/Voiture.php';

$voiture1 = new Voiture('Renault', 'Clio');
echo $voiture1->afficherInfos() . '<br>';

$voiture2 = new Voiture('Peugeot', '208');
echo $voiture2->afficherInfos() . '<br>';
