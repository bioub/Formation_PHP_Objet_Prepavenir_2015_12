<?php
// Lister des enregistrement d'une base de données

// 1 - Se connecter à la base de données
$dsn = 'mysql:host=localhost;dbname=prepavenir_annonces_auto;charset=UTF8';
$username = 'root';
$password = '';
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 2 - Ecrire la requête SQL (SELECT ...)
$sql = "SELECT marque, modele "
     . "FROM voiture "
     . "ORDER BY marque, modele "
     . "LIMIT 100";

// 3 - Exécuter la requête
$stmt = $pdo->query($sql);

// 4 - Rappatrier les résultats
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 5 - Afficher les données dans la vue (HTML)
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
                <?=htmlspecialchars($voiture['marque'])?>
                <?=htmlspecialchars($voiture['modele'])?>
            </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
