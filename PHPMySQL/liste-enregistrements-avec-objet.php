<?php

use Prepavenir\Mapper\VoitureMapper;
require_once './includes/autoload.php';

// Lister des enregistrement d'une base de données

// 1 - Se connecter à la base de données
$dsn = 'mysql:host=localhost;dbname=prepavenir_annonces_auto;charset=UTF8';
$username = 'root';
$password = '';
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 2 - Demande les données au Modèle (mapper)
$mapper = new VoitureMapper($pdo);
$result = $mapper->findAll();

// 3 - Afficher les données dans la Vue (HTML)
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Liste des voitures</h2>
        <ul>
            
            <?php foreach($result as $voiture) : ?>
            <li>
                <?=htmlspecialchars($voiture->getMarque())?>
                <?=htmlspecialchars($voiture->getModele())?>
            </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
