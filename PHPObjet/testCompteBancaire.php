<?php

// Exercice, créer la classe CompteBancaire
// qui correspond au code de test suivant :

require_once './classes/Prepavenir/Entity/CompteBancaire.php';

$bnp = new CompteBancaire('Jean', 1000, 'Compte Courant');

echo $bnp->afficherInfos(); // Compte Courant de Jean, solde : 1000 euros

$bnp->debiter(500);
$bnp->crediter(300);

echo $bnp->afficherInfos(); // Compte Courant de Jean, solde : 800 euros
